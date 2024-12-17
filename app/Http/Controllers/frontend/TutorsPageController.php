<?php

namespace App\Http\Controllers\frontend;
use App\Models\Tutor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;

class TutorsPageController extends Controller
{
    public function index()
    {
        $title = TranslationHelper::getTranslation('Tutors');
        $breadCrumb = TranslationHelper::getTranslation('Tutors');
        $categories = Category::all();
        $tutors = Tutor::all();
        return view('frontend.tutors.index', compact('title','tutors','breadCrumb', 'categories'));
    }

    public function detail($slug)
    {
        $title = TranslationHelper::getTranslation('Tutors');
        $tutor = Tutor::where('slug', $slug)->first();
        $tutors = Tutor::paginate(5)->whereNotIn('slug', $slug);
        $breadCrumb = $tutor->name;
        return view('frontend.tutors.detail', compact('title','tutor','breadCrumb','tutors'));
    }
}
