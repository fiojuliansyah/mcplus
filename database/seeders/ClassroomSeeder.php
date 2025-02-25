<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Classroom;
use App\Models\Tutor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Classrooms
        $classrooms = [
            ['name' => 'Form 5', 'slug' => 'form-5'],
            ['name' => 'Form 4', 'slug' => 'form-4'],
            ['name' => 'Form 3', 'slug' => 'form-3'],
            ['name' => 'Form 2', 'slug' => 'form-2'],
            ['name' => 'Form 1', 'slug' => 'form-1'],
            ['name' => 'Year 6', 'slug' => 'year-6'],
            ['name' => 'Year 5', 'slug' => 'year-5'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create($classroom);
        }

        // Seed Categories
        $categories = [
            ['name' => 'Bahasa Melayu', 'slug' => 'bahasa-melayu'],
            ['name' => 'English', 'slug' => 'english'],
            ['name' => 'Mathematics', 'slug' => 'mathematics'],
            ['name' => 'Science', 'slug' => 'science'],
            ['name' => 'Sejarah', 'slug' => 'sejarah'],
            ['name' => 'Physics', 'slug' => 'physics'],
            ['name' => 'Chemistry', 'slug' => 'chemistry'],
            ['name' => 'Add Math', 'slug' => 'add-math'],
            ['name' => 'Accounts', 'slug' => 'accounts'],
            ['name' => 'Ekonomi', 'slug' => 'ekonomi'],
            ['name' => 'Perniagaan', 'slug' => 'perniagaan'],
            ['name' => 'Geografi', 'slug' => 'geografi'],
            ['name' => 'Biology', 'slug' => 'biology'],
            ['name' => 'Mandarin', 'slug' => 'mandarin'],
            ['name' => 'Kelas Ngaji', 'slug' => 'kelas-ngaji'],
            ['name' => 'Sujud Kita', 'slug' => 'sujud-kita'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Seed Questions
        $questions = [
            [
                'question_text' => 'Why Choose McPlus?',
                'type' => 'paragraph',
            ],
            [
                'question_text' => 'Subjects do you like?',
                'type' => 'multiple',
            ],
            [
                'question_text' => 'What day schedule do you want?',
                'type' => 'single',
            ],
            [
                'question_text' => 'Tutor you want?',
                'type' => 'single',
            ],
            [
                'question_text' => 'Ceritakan alasan Anda tertarik mengikuti kursus ini',
                'type' => 'paragraph',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

        // Seed Answers
        $subjectQuestion = Question::where('question_text', 'Subjects do you like?')->first();
        $scheduleQuestion = Question::where('question_text', 'What day schedule do you want?')->first();
        $tutorQuestion = Question::where('question_text', 'Tutor you want?')->first();

        if ($subjectQuestion) {
            $subjects = [
                ['answer_text' => 'Bahasa Melayu', 'slug' => 'bahasa-melayu'],
                ['answer_text' => 'English', 'slug' => 'english'],
                ['answer_text' => 'Mathematics', 'slug' => 'mathematics'],
                ['answer_text' => 'Science', 'slug' => 'science'],
                ['answer_text' => 'Sejarah', 'slug' => 'sejarah'],
                ['answer_text' => 'Physics', 'slug' => 'physics'],
                ['answer_text' => 'Chemistry', 'slug' => 'chemistry'],
                ['answer_text' => 'Add Math', 'slug' => 'add-math'],
                ['answer_text' => 'Accounts', 'slug' => 'accounts'],
                ['answer_text' => 'Ekonomi', 'slug' => 'ekonomi'],
                ['answer_text' => 'Perniagaan', 'slug' => 'perniagaan'],
                ['answer_text' => 'Geografi', 'slug' => 'geografi'],
                ['answer_text' => 'Biology', 'slug' => 'biology'],
                ['answer_text' => 'Mandarin', 'slug' => 'mandarin'],
                ['answer_text' => 'Kelas Ngaji', 'slug' => 'kelas-ngaji'],
                ['answer_text' => 'Sujud Kita', 'slug' => 'sujud-kita'],
            ];

            foreach ($subjects as $subject) {
                Answer::create([
                    'question_id' => $subjectQuestion->id,
                    'answer_text' => $subject['answer_text'],
                    'slug' => $subject['slug']
                ]);
            }
        }

        // Jawaban untuk pertanyaan jadwal
        if ($scheduleQuestion) {
            $days = [
                ['answer_text' => 'Weekdays', 'slug' => 'weekdays'],
                ['answer_text' => 'Weekend', 'slug' => 'weekend'],
            ];

            foreach ($days as $day) {
                Answer::create([
                    'question_id' => $scheduleQuestion->id,
                    'answer_text' => $day['answer_text'],
                    'slug' => $day['slug']
                ]);
            }
        }

        if ($tutorQuestion) {
            $tutors = [
                ['answer_text' => 'Only 1 Tutor', 'slug' => 'only-1-tutor'],
                ['answer_text' => 'Multiple Tutor', 'slug' => 'multiple-tutor'],
            ];

            foreach ($tutors as $tutor) {
                Answer::create([
                    'question_id' => $tutorQuestion->id,
                    'answer_text' => $tutor['answer_text'],
                    'slug' => $tutor['slug']
                ]);
            }
        }
        
        // Seed Tutors with updated list and numbers
        // Ambil semua kategori
        $categoriesMap = Category::all()->keyBy('name');

        // Data tutor dengan ID, nama, dan kategori dari daftar terbaru
        $tutorsList = [
            ['id' => 1, 'name' => 'Ms Aina', 'category' => 'English'],
            ['id' => 2, 'name' => 'Aainaa Bajuri', 'category' => 'Sejarah'],
            ['id' => 3, 'name' => 'Ms Amaliah', 'category' => 'Science'],
            ['id' => 4, 'name' => 'Sir Amir Maaruf', 'category' => 'Mathematics'], // Juga Add Math
            ['id' => 5, 'name' => 'Sir Asri', 'category' => 'English'],
            ['id' => 6, 'name' => 'Sir Badang', 'category' => 'Ekonomi'], // Juga Perniagaan
            ['id' => 7, 'name' => 'Sir Daniel Eskay', 'category' => 'Bahasa Melayu'],
            ['id' => 8, 'name' => 'Ms Emy', 'category' => 'Mathematics'],
            ['id' => 9, 'name' => 'Sir Fadzly', 'category' => 'Accounts'],
            ['id' => 10, 'name' => 'Ms Farah', 'category' => 'Mathematics'], // Juga Science
            ['id' => 11, 'name' => 'Sir Fathi', 'category' => 'Mathematics'], // Juga Add Math
            ['id' => 12, 'name' => 'Sir Firdaus', 'category' => 'Sejarah'], // Juga Geografi
            ['id' => 13, 'name' => 'Sir Ghazz', 'category' => 'Add Math'],
            ['id' => 14, 'name' => 'Sir Hamidi', 'category' => 'Science'], // Juga Biology
            ['id' => 15, 'name' => 'Sir Hazeeq', 'category' => 'Chemistry'], // Juga Physics
            ['id' => 16, 'name' => 'Sir Idris', 'category' => 'Sejarah'], // Juga Geografi
            ['id' => 17, 'name' => 'Sir Ifwat', 'category' => 'Mathematics'], // Juga Add Math
            ['id' => 18, 'name' => 'Sir Iqbal', 'category' => 'Science'], // Juga Biology
            ['id' => 19, 'name' => 'Ms Maryam Khan', 'category' => 'English'],
            ['id' => 20, 'name' => 'Ms Niessa', 'category' => 'Accounts'],
            ['id' => 21, 'name' => 'Ms Nasuha', 'category' => 'Physics'],
            ['id' => 22, 'name' => 'Ms Nuha', 'category' => 'Bahasa Melayu'], // Juga English
            ['id' => 23, 'name' => 'Sir Omar', 'category' => 'Accounts'], // Juga Ekonomi
            ['id' => 24, 'name' => 'Sir Rauf', 'category' => 'Mathematics'],
            ['id' => 25, 'name' => 'Ms Rossa', 'category' => 'Sejarah'],
            ['id' => 26, 'name' => 'Ms Sakinah', 'category' => 'Chemistry'],
            ['id' => 27, 'name' => 'Ms Sara Khan', 'category' => 'Science'], // Juga Biology
            ['id' => 28, 'name' => 'Sir Shafiee', 'category' => 'Physics'],
            ['id' => 29, 'name' => 'Sir Shahzad', 'category' => 'Science'],
            ['id' => 30, 'name' => 'Sir Shahrol', 'category' => 'Bahasa Melayu'],
            ['id' => 31, 'name' => 'Ms Syaza', 'category' => 'Bahasa Melayu'],
            ['id' => 32, 'name' => 'Sir Shukri', 'category' => 'English'],
            ['id' => 33, 'name' => 'Sir Syahmi', 'category' => 'Sejarah'], // Juga Geografi
            ['id' => 34, 'name' => 'Ms Syuhada', 'category' => 'Mathematics'],
            ['id' => 35, 'name' => 'Sir Syuhadak', 'category' => 'Bahasa Melayu'],
            ['id' => 36, 'name' => 'Sir Taufik', 'category' => 'Physics'],
            ['id' => 37, 'name' => 'Sir Theva', 'category' => 'Chemistry'], // Juga Physics
            ['id' => 38, 'name' => 'Sir Uzairi', 'category' => 'Mathematics'],
            ['id' => 39, 'name' => 'Ms Zack Kirana', 'category' => 'Bahasa Melayu'],
            ['id' => 40, 'name' => 'Sir Zacky', 'category' => 'Science'], // Juga Biology
            ['id' => 41, 'name' => 'Ms Zaza', 'category' => 'Ekonomi'], // Juga Perniagaan
            ['id' => 42, 'name' => 'Ms Zulfah', 'category' => 'Science'],
            ['id' => 43, 'name' => 'Ms Marza', 'category' => 'Mathematics'], // Juga English
            ['id' => 44, 'name' => 'Laoshi Fatin', 'category' => 'Mandarin'],
            ['id' => 45, 'name' => 'Laoshi Nadhirah', 'category' => 'Mandarin'],
            ['id' => 46, 'name' => 'Ustazah Umi', 'category' => 'Kelas Ngaji'],
            ['id' => 47, 'name' => 'Ustaz Zool', 'category' => 'Kelas Ngaji'],
            ['id' => 48, 'name' => 'Ustaz Akmal', 'category' => 'Kelas Ngaji'],
            ['id' => 49, 'name' => 'Ustaz Fathi', 'category' => 'Kelas Ngaji'],
            ['id' => 50, 'name' => 'Ustaz Azizi', 'category' => 'Kelas Ngaji'],
            ['id' => 51, 'name' => 'Ustaz Amzar', 'category' => 'Kelas Ngaji'],
            ['id' => 52, 'name' => 'Ustaz Amirul', 'category' => 'Sujud Kita'],
        ];

        $tutorsData = [];
        $now = Carbon::now();

        foreach ($tutorsList as $tutorInfo) {
            $name = $tutorInfo['name'];
            $slug = Str::slug($name);
            $categoryName = $tutorInfo['category'];
            
            // Ambil category_id berdasarkan nama kategori
            $categoryId = $categoriesMap->has($categoryName) 
                ? $categoriesMap[$categoryName]->id 
                : null;
                
            // Jika kategori tidak ditemukan, lewati
            if (!$categoryId) {
                continue;
            }
            
            // Buat placeholder untuk video dan image
            $placeholderImageUrl = 'https://example.com/tutors/' . $slug . '.jpg';
            $placeholderVideoUrl = 'https://www.youtube.com/embed/placeholder';
            
            $tutorsData[] = [
                'category_id' => $categoryId,
                'slug' => $slug,
                'name' => $name,
                'image_url' => $placeholderImageUrl,
                'image_public_id' => 'tutors/' . $slug,
                'video_url' => $placeholderVideoUrl,
                'video_public_id' => 'videos/' . $slug,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('tutors')->insert($tutorsData);
    }
}