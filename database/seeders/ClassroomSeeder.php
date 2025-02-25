<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            ['name' => 'Form 1', 'slug' => 'form-1'],
            ['name' => 'Form 2', 'slug' => 'form-2'],
            ['name' => 'Form 3', 'slug' => 'form-3'],
            ['name' => 'Form 4', 'slug' => 'form-4'],
            ['name' => 'Form 5', 'slug' => 'form-5'],
            ['name' => 'Year 5', 'slug' => 'year-5'],
            ['name' => 'Year 6', 'slug' => 'year-6'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create($classroom);
        }

        $categories = [
            ['name' => 'Bahasa Melayu', 'slug' => 'bahasa-melayu'],
            ['name' => 'English', 'slug' => 'english'],
            ['name' => 'Mathematics', 'slug' => 'mathematics'],
            ['name' => 'Science', 'slug' => 'science'],
            ['name' => 'Sejarah', 'slug' => 'sejarah'],
            ['name' => 'Physic', 'slug' => 'physics'],
            ['name' => 'Chemistry', 'slug' => 'chemistry'],
            ['name' => 'Add Math', 'slug' => 'add-math'],
            ['name' => 'Accounts', 'slug' => 'accounts'],
            ['name' => 'Ekonomi', 'slug' => 'ekonomi'],
            ['name' => 'Perniagaan', 'slug' => 'perniagaan'],
            ['name' => 'Geografi', 'slug' => 'geografi'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

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
        
    }
}
