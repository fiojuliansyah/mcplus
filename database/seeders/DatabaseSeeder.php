<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\ClassroomSeeder;
use Database\Seeders\TimeTableSeeder;
use Database\Seeders\TranslationSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        RolePermissionSeeder::class,
        UserSeeder::class,
        LanguageSeeder::class,
        TranslationSeeder::class,
        ClassroomSeeder::class,
        TimeTableSeeder::class,
        ]);
    }
}
