<?php

// database/seeders/LanguageSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        // Insert sample languages
        Language::create([
            'code' => 'en',
            'name' => 'english',
        ]);
    }
}

