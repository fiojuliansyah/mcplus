<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Tutor;
use App\Models\Classroom;
use App\Models\SurveyUser;
use App\Models\SurveyResponse;
use App\Models\SurveyResponseAnswer;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function index()
    {
        $title = 'Survey Subject';
    
        $questions = Question::with('answers')->get();
        $classrooms = Classroom::all();
    
        return view('frontend.survey.index', compact('title', 'questions', 'classrooms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'classroom_id' => 'required|string',
            'answers' => 'required|array',
        ]);
    
        if (empty($validatedData['answers'])) {
            return redirect()->back()->with('error', 'Please answer all the questions.');
        }
    
        $user = SurveyUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'classroom_id' => $validatedData['classroom_id'],
        ]);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Failed to save user data.');
        }
    
        $categorySlugs = []; // Diubah menjadi array untuk menampung multiple categories
        $tutorMode = null; // Mode untuk menampilkan tutor (single atau multiple)
    
        foreach ($validatedData['answers'] as $questionId => $answerValue) {
            if (is_array($answerValue)) {
                foreach ($answerValue as $singleAnswerId) {
                    $surveyResponse = SurveyResponse::create([
                        'user_id' => $user->id,
                        'question_id' => $questionId,
                        'response_text' => null,
                    ]);
    
                    SurveyResponseAnswer::create([
                        'survey_response_id' => $surveyResponse->id,
                        'answer_id' => $singleAnswerId,
                    ]);
                    
                    $this->checkAnswerForSlug($singleAnswerId, $categorySlugs, $tutorSlug, $tutorMode, $timetableSlug);
                }
            } elseif (is_numeric($answerValue)) {
                $surveyResponse = SurveyResponse::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'response_text' => null,
                ]);
    
                SurveyResponseAnswer::create([
                    'survey_response_id' => $surveyResponse->id,
                    'answer_id' => $answerValue,
                ]);
                
                $this->checkAnswerForSlug($answerValue, $categorySlugs, $tutorSlug, $tutorMode, $timetableSlug);
            } else {
                SurveyResponse::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'response_text' => $answerValue,
                ]);
            }
        }
    
        $redirectParams = ['classroom_id' => $validatedData['classroom_id']];
        
        if (!empty($categorySlugs)) {
            $redirectParams['categories'] = implode(',', $categorySlugs); // Konversi array ke string dengan pemisah koma
        }
        
        if ($tutorMode) {
            $redirectParams['tutor_mode'] = $tutorMode;
        }
        
        // if ($tutorSlug) {
        //     $redirectParams['tutor'] = $tutorSlug;
        // }
        
        return redirect()->route('frontend.survey.detail', $redirectParams);
    }
    
    private function checkAnswerForSlug($answerId, &$categorySlugs, &$tutorSlug, &$tutorMode, &$timetableSlug)
    {
        $answer = Answer::find($answerId);
        
        if (!$answer || !$answer->slug) {
            return;
        }
        
        // Periksa apakah ini adalah kategori
        $category = Category::where('slug', $answer->slug)->first();
        if ($category) {
            $categorySlugs[] = $answer->slug; // Tambahkan ke array daripada menimpa nilai
            return;
        }
        
        // Periksa apakah ini adalah tutor spesifik
        // $tutor = Tutor::where('slug', $answer->slug)->first();
        // if ($tutor) {
        //     $tutorSlug = $answer->slug;
        //     return;
        // }
        
        // Periksa mode tutor
        if ($answer->slug === 'only-1-tutor') {
            $tutorMode = 'single';
            return;
        }
        
        if ($answer->slug === 'multiple-tutor') {
            $tutorMode = 'multiple';
            return;
        }
        
        // Periksa timetable (jika diperlukan)
        // ...
    }
    
    public function detail(Request $request)
    {
        $title = 'Time Table';
        
        $classroom_id = $request->input('classroom_id');
        $categorySlugsParam = $request->input('categories');
        $categorySlugs = $categorySlugsParam ? explode(',', $categorySlugsParam) : []; // Konversi string kembali ke array
        $tutorSlug = $request->input('tutor');
        $tutorMode = $request->input('tutor_mode'); // Mode tutor dari parameter
        
        $query = Classroom::with(['promos']);
        
        if ($classroom_id) {
            $query->where('id', $classroom_id);
        }
        
        $classrooms = $query->get();
        
        if ($classrooms->isEmpty()) {
            return view('frontend.survey.detail', compact('title', 'classrooms'));
        }
        
        foreach ($classrooms as $classroom) {
            // Start with base timetable query for this classroom
            $timetableQuery = $classroom->timetables()
                ->with(['category', 'tutor']);
            
            // Apply category filter if provided
            if (!empty($categorySlugs)) {
                $timetableQuery->whereHas('category', function($q) use ($categorySlugs) {
                    $q->whereIn('slug', $categorySlugs); // Gunakan whereIn untuk multiple categories
                });
            }
            
            // Get timetables with filters applied
            $filteredTimetables = $timetableQuery->get();
            
            // Apply tutor filter based on mode
            if ($tutorMode == 'single' && !$tutorSlug) {
                // Group timetables by category
                $timetablesByCategory = $filteredTimetables->groupBy(function($timetable) {
                    return $timetable->category_id ?? 'no-category';
                });
                
                // For each category, keep only one tutor
                $singleTutorTimetables = collect();
                foreach ($timetablesByCategory as $categoryId => $categoryTimetables) {
                    // Group by tutor within this category
                    $timetablesByTutor = $categoryTimetables->groupBy('tutor_id');
                    
                    // Take the first tutor's timetables only
                    if ($timetablesByTutor->isNotEmpty()) {
                        $firstTutorTimetables = $timetablesByTutor->first();
                        $singleTutorTimetables = $singleTutorTimetables->merge($firstTutorTimetables);
                    }
                }
                
                $classroom->setRelation('timetables', $singleTutorTimetables);
            }
            else if ($tutorSlug) {
                // If a specific tutor is selected, filter by that tutor
                $tutorFilteredTimetables = $filteredTimetables->filter(function($timetable) use ($tutorSlug) {
                    return $timetable->tutor && $timetable->tutor->slug === $tutorSlug;
                });
                
                $classroom->setRelation('timetables', $tutorFilteredTimetables);
            }
            else {
                // Mode 'multiple' atau default, tampilkan semua tutor sesuai kategori
                $classroom->setRelation('timetables', $filteredTimetables);
            }
        }
        
        // Passing data filter ke view
        $filters = [
            'categories' => $categorySlugs, // Sekarang categories adalah array
            'tutor_mode' => $tutorMode
        ];
        
        return view('frontend.survey.detail', compact('title', 'classrooms', 'filters'));
    }
}