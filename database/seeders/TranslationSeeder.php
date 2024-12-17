<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;
use App\Models\Language;

class TranslationSeeder extends Seeder
{
    public function run()
    {
        $language = Language::where('code', 'en')->first();

        $translations = [
            'Tutors' => 'Tutors',
            'Tutor' => 'Tutor',
            'All Categories' => 'All Categories',
            'Become MC+ Tutor?' => 'Become MC+ Tutor?',
            'Its time for you to make a change!' => 'Its time for you to make a change!',
            'Enjoy a Fun Tuition Class' => 'Enjoy a Fun Tuition Class',
            'with Tutor' => 'with Tutor',
            'in MCPLUS Online Tuition!' => 'in MCPLUS Online Tuition!',
            'Hey Guys! Join me on MCPLUS!' => 'Hey Guys! Join me on MCPLUS!',
            'Download & install MC PLUS Mobile App now' => 'Download & install MC PLUS Mobile App now',
            'GET IN ON GOOGLE PLAY' => 'GET IN ON GOOGLE PLAY',
            'DOWNLOAD ON THE APP STORE' => 'DOWNLOAD ON THE APP STORE',
            'Other MCPLUS Tutors' => 'Other MCPLUS Tutors',
            'Contact Us' => 'Contact Us',
            'Login' => 'Login',
            'Sign In to your Account' => 'Sign In to your Account',
            'Welcome back! please enter your detail' => 'Welcome back! please enter your detail',
            'Remember me' => 'Remember me',
            'Forgot Password?' => 'Forgot Password?',
            'Register' => 'Register',
            'Welcome' => 'Welcome',
            'Dashboard' => 'Dashboard',
        ];

        foreach ($translations as $key => $translation) {
            Translation::create([
                'key' => $key,
                'language_id' => $language->id,
                'translation' => $translation,
            ]);
        }
    }
}
