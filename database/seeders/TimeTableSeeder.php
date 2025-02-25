<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Tutor;
use Carbon\Carbon;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all categories, classrooms, and tutors for reference
        $categories = Category::all()->keyBy('name');
        $classrooms = Classroom::all()->keyBy('name');
        $tutors = Tutor::all()->keyBy('name');

        // Default classroom and form level (assuming Form 5 for most classes)
        $defaultClassroom = $classrooms['Form 5'] ?? null;
        $defaultClassroomId = $defaultClassroom ? $defaultClassroom->id : null;

        // Time tables data structure
        $timeTables = [
            // MONDAY
            [
                'day' => 'MONDAY',
                'start' => '16:50:00',
                'end' => '17:50:00',
                'category_name' => 'Mathematics',
                'group' => 'A',
                'tutor_name' => 'Sir Uzairi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '16:50:00',
                'end' => '17:50:00',
                'category_name' => 'Mathematics',
                'group' => 'A',
                'tutor_name' => 'Sir Amir Maaruf',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '18:00:00',
                'end' => '19:20:00',
                'category_name' => 'Add Math',
                'group' => 'A',
                'tutor_name' => 'Sir Ghazz',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '18:00:00',
                'end' => '19:20:00',
                'category_name' => 'Add Math',
                'group' => 'A',
                'tutor_name' => 'Sir Amir Maaruf',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Bahasa Melayu',
                'group' => 'A',
                'tutor_name' => 'Sir Syuhadak',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Perniagaan',
                'group' => 'A',
                'tutor_name' => 'Sir Badang',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Biology',
                'group' => 'A',
                'tutor_name' => 'Sir Hamidi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '21:15:00',
                'end' => '22:15:00',
                'category_name' => 'Ekonomi',
                'group' => 'A',
                'tutor_name' => 'Sir Badang',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '21:25:00',
                'end' => '22:25:00',
                'category_name' => 'Science',
                'group' => 'A',
                'tutor_name' => 'Sir Hamidi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Physics',
                'group' => 'A',
                'tutor_name' => 'Sir Hazeeq',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'MONDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Physics',
                'group' => 'A',
                'tutor_name' => 'Ms Nasuha',
                'classroom_id' => $defaultClassroomId,
            ],

            // TUESDAY
            [
                'day' => 'TUESDAY',
                'start' => '16:45:00',
                'end' => '18:00:00',
                'category_name' => 'Biology',
                'group' => 'A',
                'tutor_name' => 'Ms Sara Khan',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '17:00:00',
                'end' => '18:00:00',
                'category_name' => 'Science',
                'group' => 'A',
                'tutor_name' => 'Sir Zacky',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '18:10:00',
                'end' => '19:10:00',
                'category_name' => 'English',
                'group' => 'A',
                'tutor_name' => 'Ms Aina',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '18:10:00',
                'end' => '19:10:00',
                'category_name' => 'English',
                'group' => 'A',
                'tutor_name' => 'Sir Shukri',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Mathematics',
                'group' => 'A',
                'tutor_name' => 'Sir Fathi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Ekonomi',
                'group' => 'A',
                'tutor_name' => 'Ms Zaza',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Physics',
                'group' => 'A',
                'tutor_name' => 'Sir Shafiee',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '21:15:00',
                'end' => '22:15:00',
                'category_name' => 'Science',
                'group' => 'A',
                'tutor_name' => 'Ms Sara Khan',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Chemistry',
                'group' => 'A',
                'tutor_name' => 'Sir Hazeeq',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'TUESDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Biology',
                'group' => 'A',
                'tutor_name' => 'Sir Zacky',
                'classroom_id' => $defaultClassroomId,
            ],

            // WEDNESDAY
            [
                'day' => 'WEDNESDAY',
                'start' => '18:00:00',
                'end' => '19:00:00',
                'category_name' => 'Science',
                'group' => 'A',
                'tutor_name' => 'Sir Iqbal',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'WEDNESDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Add Math',
                'group' => 'A',
                'tutor_name' => 'Sir Ifwat',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'WEDNESDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Chemistry',
                'group' => 'A',
                'tutor_name' => 'Ms Sakinah',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'WEDNESDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Accounts',
                'group' => 'A',
                'tutor_name' => 'Sir Fadzly',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'WEDNESDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Accounts',
                'group' => 'A',
                'tutor_name' => 'Ms Niessa',
                'classroom_id' => $defaultClassroomId,
            ],

            // THURSDAY
            [
                'day' => 'THURSDAY',
                'start' => '16:50:00',
                'end' => '17:50:00',
                'category_name' => 'English',
                'group' => 'A',
                'tutor_name' => 'Ms Maryam Khan',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '18:00:00',
                'end' => '19:20:00',
                'category_name' => 'Physics',
                'group' => 'A',
                'tutor_name' => 'Sir Theva',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Sejarah',
                'group' => 'A',
                'tutor_name' => 'Sir Syahmi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Sejarah',
                'group' => 'A',
                'tutor_name' => 'Ms Rossa',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Accounts',
                'group' => 'A',
                'tutor_name' => 'Sir Omar',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '21:15:00',
                'end' => '22:30:00',
                'category_name' => 'Biology',
                'group' => 'A',
                'tutor_name' => 'Sir Iqbal',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '21:25:00',
                'end' => '22:25:00',
                'category_name' => 'Perniagaan',
                'group' => 'A',
                'tutor_name' => 'Sir Omar',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'THURSDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Add Math',
                'group' => 'A',
                'tutor_name' => 'Sir Fathi',
                'classroom_id' => $defaultClassroomId,
            ],

            // FRIDAY
            [
                'day' => 'FRIDAY',
                'start' => '16:50:00',
                'end' => '18:05:00',
                'category_name' => 'Chemistry',
                'group' => 'A',
                'tutor_name' => 'Sir Theva',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '16:50:00',
                'end' => '18:05:00',
                'category_name' => 'Accounts',
                'group' => 'B',
                'tutor_name' => 'Ms Niessa',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '17:00:00',
                'end' => '18:00:00',
                'category_name' => 'Bahasa Melayu',
                'group' => 'A',
                'tutor_name' => 'Ms Zack Kirana',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '18:10:00',
                'end' => '19:10:00',
                'category_name' => 'Mathematics',
                'group' => 'A',
                'tutor_name' => 'Sir Ifwat',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '18:10:00',
                'end' => '19:25:00',
                'category_name' => 'Physics',
                'group' => 'B',
                'tutor_name' => 'Sir Hazeeq',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'Mathematics',
                'group' => 'B',
                'tutor_name' => 'Sir Uzairi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Accounts',
                'group' => 'B',
                'tutor_name' => 'Sir Fadzly',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '21:25:00',
                'end' => '22:25:00',
                'category_name' => 'Perniagaan',
                'group' => 'B',
                'tutor_name' => 'Sir Omar',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Physics',
                'group' => 'A',
                'tutor_name' => 'Sir Taufik',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Physics',
                'group' => 'B',
                'tutor_name' => 'Sir Theva',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Add Math',
                'group' => 'B',
                'tutor_name' => 'Sir Ifwat',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'FRIDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Add Math',
                'group' => 'B',
                'tutor_name' => 'Sir Fathi',
                'classroom_id' => $defaultClassroomId,
            ],

            // SATURDAY
            [
                'day' => 'SATURDAY',
                'start' => '09:30:00',
                'end' => '10:30:00',
                'category_name' => 'Bahasa Melayu',
                'group' => 'B',
                'tutor_name' => 'Ms Zack Kirana',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '10:45:00',
                'end' => '11:45:00',
                'category_name' => 'Science',
                'group' => 'B',
                'tutor_name' => 'Sir Iqbal',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '12:00:00',
                'end' => '13:00:00',
                'category_name' => 'Sejarah',
                'group' => 'B',
                'tutor_name' => 'Sir Syahmi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '14:00:00',
                'end' => '15:00:00',
                'category_name' => 'Ekonomi',
                'group' => 'B',
                'tutor_name' => 'Sir Badang',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '14:45:00',
                'end' => '16:00:00',
                'category_name' => 'Biology',
                'group' => 'B',
                'tutor_name' => 'Sir Iqbal',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '14:45:00',
                'end' => '16:00:00',
                'category_name' => 'Biology',
                'group' => 'B',
                'tutor_name' => 'Ms Sara Khan',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '15:15:00',
                'end' => '16:15:00',
                'category_name' => 'Perniagaan',
                'group' => 'B',
                'tutor_name' => 'Sir Badang',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'category_name' => 'Science',
                'group' => 'B',
                'tutor_name' => 'Ms Sara Khan',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '16:30:00',
                'end' => '17:45:00',
                'category_name' => 'Chemistry',
                'group' => 'B',
                'tutor_name' => 'Sir Theva',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '18:00:00',
                'end' => '19:00:00',
                'category_name' => 'Sejarah',
                'group' => 'B',
                'tutor_name' => 'Ms Rossa',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Add Math',
                'group' => 'B',
                'tutor_name' => 'Sir Amir Maaruf',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SATURDAY',
                'start' => '21:25:00',
                'end' => '22:40:00',
                'category_name' => 'Physics',
                'group' => 'B',
                'tutor_name' => 'Sir Taufik',
                'classroom_id' => $defaultClassroomId,
            ],

            // SUNDAY
            [
                'day' => 'SUNDAY',
                'start' => '16:45:00',
                'end' => '17:45:00',
                'category_name' => 'English',
                'group' => 'B',
                'tutor_name' => 'Ms Maryam Khan',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '16:45:00',
                'end' => '17:45:00',
                'category_name' => 'English',
                'group' => 'B',
                'tutor_name' => 'Sir Shukri',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '18:10:00',
                'end' => '19:10:00',
                'category_name' => 'Mathematics',
                'group' => 'B',
                'tutor_name' => 'Sir Fathi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '20:00:00',
                'end' => '21:00:00',
                'category_name' => 'English',
                'group' => 'B',
                'tutor_name' => 'Ms Aina',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Biology',
                'group' => 'B',
                'tutor_name' => 'Sir Hamidi',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Biology',
                'group' => 'B',
                'tutor_name' => 'Sir Zacky',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Accounts',
                'group' => 'B',
                'tutor_name' => 'Sir Omar',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '20:00:00',
                'end' => '21:15:00',
                'category_name' => 'Chemistry',
                'group' => 'B',
                'tutor_name' => 'Sir Hazeeq',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '21:30:00',
                'end' => '22:30:00',
                'category_name' => 'English',
                'group' => 'B',
                'tutor_name' => 'Sir Asri',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '21:30:00',
                'end' => '22:30:00',
                'category_name' => 'Ekonomi',
                'group' => 'B',
                'tutor_name' => 'Ms Zaza',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '21:30:00',
                'end' => '22:30:00',
                'category_name' => 'Science',
                'group' => 'B',
                'tutor_name' => 'Sir Zacky',
                'classroom_id' => $defaultClassroomId,
            ],
            [
                'day' => 'SUNDAY',
                'start' => '21:30:00',
                'end' => '22:30:00',
                'category_name' => 'Science',
                'group' => 'B',
                'tutor_name' => 'Sir Hamidi',
                'classroom_id' => $defaultClassroomId,
            ],
        ];

        // Process and insert data
        $timeTableData = [];
        $now = Carbon::now();

        foreach ($timeTables as $timeTable) {
            $categoryName = $timeTable['category_name'];
            $tutorName = $timeTable['tutor_name'];

            // Get category ID
            $categoryId = null;
            if (isset($categories[$categoryName])) {
                $categoryId = $categories[$categoryName]->id;
            }

            // Get tutor ID
            $tutorId = null;
            if (isset($tutors[$tutorName])) {
                $tutorId = $tutors[$tutorName]->id;
            }

            // Create start and end timestamps
            $startDate = Carbon::now()->format('Y-m-d') . ' ' . $timeTable['start'];
            $endDate = Carbon::now()->format('Y-m-d') . ' ' . $timeTable['end'];

            $timeTableData[] = [
                'day' => $timeTable['day'],
                'start' => $startDate,
                'end' => $endDate,
                'classroom_id' => $timeTable['classroom_id'],
                'category_id' => $categoryId,
                'group' => $timeTable['group'],
                'tutor_id' => $tutorId,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // Insert all time tables at once
        DB::table('time_tables')->insert($timeTableData);
    }
}