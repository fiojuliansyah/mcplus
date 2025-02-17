<?php

namespace App\Http\Controllers\frontend;

use App\Models\Answer;
use App\Models\Question;
use App\Models\SurveyUser;
use Illuminate\Http\Request;
use App\Models\SurveyResponse;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function index()
    {
        $title = 'Survey Subject';
    
        $questions = Question::with('answers')->get();
    
        return view('frontend.survey.index', compact('title', 'questions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'class' => 'required|string',
            'answers' => 'required|array',
        ]);
    
        // Simpan Data User
        $user = SurveyUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'class' => $validatedData['class'],
        ]);
    
        // Pastikan user berhasil dibuat
        if (!$user) {
            return redirect()->back()->with('error', 'Failed to save user data.');
        }
    
        // Simpan Jawaban
        foreach ($validatedData['answers'] as $questionId => $answerValue) {
            if (is_array($answerValue)) {
                foreach ($answerValue as $singleAnswerId) {
                    SurveyResponse::create([
                        'user_id' => $user->id,
                        'question_id' => $questionId,
                        'answer_id' => $singleAnswerId,
                        'response_text' => null,
                    ]);
                }
            } elseif (is_numeric($answerValue)) {
                SurveyResponse::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'answer_id' => $answerValue,
                    'response_text' => null,
                ]);
            } else {
                SurveyResponse::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'answer_id' => null,
                    'response_text' => $answerValue,
                ]);
            }
        }
    
        $redirectUrl = 'https://login.mcplus.my/auth/realms/mathclinic/protocol/openid-connect/auth?state=1e6745a24d966441e7166f6fe274d1ac&scope=name%2Cemail%2Cpreferred_username&response_type=code&approval_prompt=auto&redirect_uri=https%3A%2F%2Fclassroom.mcplus.my%2Fcallback%2Fkeycloak&client_id=mathclinic';

        return redirect()->away($redirectUrl);
    }
    
}
