<?php

namespace App\Http\Controllers\frontend;

use App\Models\Program;
use App\Models\FormProgram;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use App\Models\ProgramBanner;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Models\ClassScheduleProgram;

class ProgramPageController extends Controller
{
    public function index()
    {
        $title = TranslationHelper::getTranslation('Programs');
        $breadCrumb = TranslationHelper::getTranslation('Programs');
        $programs = Program::all();
        return view('frontend.programs.index', compact('title','programs','breadCrumb'));
    }

    public function detail($slug)
    {
        $title = TranslationHelper::getTranslation('Programs');
        $program = Program::where('slug', $slug)->firstOrFail();
        $images = ProgramImage::where('program_id', $program->id)->get();
        $banners = ProgramBanner::where('program_id', $program->id)->get();
        $forms = FormProgram::where('program_id', $program->id)->get();
        $schedules = ClassScheduleProgram::where('program_id', $program->id)->get();
    
        return view('frontend.programs.detail', compact('program', 'images','title', 'forms','schedules','banners'));
    }
    
}
