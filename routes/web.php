<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BioController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\ClassPromoController;
use App\Http\Controllers\PlusianKitController;
use App\Http\Controllers\FormProgramController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\ProgramImageController;
use App\Http\Controllers\ProgramBannerController;
use App\Http\Controllers\frontend\SurveyController;
use App\Http\Controllers\PlusianKitImageController;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\frontend\TutorsPageController;
use App\Http\Controllers\ClassScheduleProgramController;
use App\Http\Controllers\frontend\ProgramPageController;
use App\Http\Controllers\frontend\PlusianKitPageController;


Route::get('/', [HomepageController::class, 'index'])->name('frontend.homepage');
Route::get('/schedules', [HomepageController::class, 'schedules'])->name('frontend.schedules');
Route::get('/time-table', [HomepageController::class, 'timeTable'])->name('frontend.time-table');
Route::get('/plusian-kits', [PlusianKitPageController::class, 'index'])->name('frontend.plusian-kits');
Route::get('/plusian-kits/{slug}', [PlusianKitPageController::class, 'detail'])->name('frontend.plusian-kits.detail');
Route::post('/change-language', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::get('/tutors', [TutorsPageController::class, 'index'])->name('frontend.tutors.index');
Route::get('/tutors/{slug}', [TutorsPageController::class, 'detail'])->name('frontend.tutors.detail');
Route::get('/programs', [ProgramPageController::class, 'index'])->name('frontend.programs.index');
Route::get('/programs/{slug}', [ProgramPageController::class, 'detail'])->name('frontend.programs.detail');
Route::get('/survey-subjects', [SurveyController::class, 'index'])->name('frontend.survey');
Route::get('/survey-subjects/detail', [SurveyController::class, 'detail'])->name('frontend.survey.detail');

Route::middleware('auth')->prefix('manage')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tutors', TutorController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('classrooms', ClassroomController::class);

    Route::prefix('classroom/{slug}/timetables')->group(function () {
        Route::get('/', [TimeTableController::class, 'index'])->name('timetables.index');
        Route::get('/create', [TimeTableController::class, 'create'])->name('timetables.create');
        Route::post('/', [TimeTableController::class, 'store'])->name('timetables.store');
        Route::get('/{id}/edit', [TimeTableController::class, 'edit'])->name('timetables.edit');
        Route::put('/{id}', [TimeTableController::class, 'update'])->name('timetables.update');
        Route::delete('/{id}', [TimeTableController::class, 'destroy'])->name('timetables.destroy');
    });

    Route::prefix('classroom/{slug}/promos')->group(function () {
        Route::get('/', [ClassPromoController::class, 'index'])->name('promos.index');
        Route::get('/create', [ClassPromoController::class, 'create'])->name('promos.create');
        Route::post('/', [ClassPromoController::class, 'store'])->name('promos.store');
        Route::get('/{id}/edit', [ClassPromoController::class, 'edit'])->name('promos.edit');
        Route::put('/{id}', [ClassPromoController::class, 'update'])->name('promos.update');
        Route::delete('/{id}', [ClassPromoController::class, 'destroy'])->name('promos.destroy');
    });
    
    // Route::resource('timetables', TimeTableController::class);

    Route::prefix('questions/{questionId}/answers')->group(function () {
        Route::get('/', [AnswerController::class, 'index'])->name('answers.index');
        Route::get('/create', [AnswerController::class, 'create'])->name('answers.create');
        Route::post('/', [AnswerController::class, 'store'])->name('answers.store');
        Route::get('/{answerId}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
        Route::put('/{answerId}', [AnswerController::class, 'update'])->name('answers.update');
        Route::delete('/{answerId}', [AnswerController::class, 'destroy'])->name('answers.destroy');
    });

    Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');



    Route::resource('plusian-kits', PlusianKitController::class);
    
    Route::prefix('plusian-kit/{slug}/images')->group(function () {
        Route::get('/', [PlusianKitImageController::class, 'index'])->name('plusian-kit.images.index');
        Route::get('/create', [PlusianKitImageController::class, 'create'])->name('plusian-kit.images.create');
        Route::post('/', [PlusianKitImageController::class, 'store'])->name('plusian-kit.images.store');
        Route::get('/{id}/edit', [PlusianKitImageController::class, 'edit'])->name('plusian-kit.images.edit');
        Route::put('/{id}', [PlusianKitImageController::class, 'update'])->name('plusian-kit.images.update');
        Route::delete('/{id}', [PlusianKitImageController::class, 'destroy'])->name('plusian-kit.images.destroy');
    });

    Route::resource('programs', ProgramController::class);

    Route::prefix('program/{slug}/images')->group(function () {
        Route::get('/', [ProgramImageController::class, 'index'])->name('program.images.index');
        Route::get('/create', [ProgramImageController::class, 'create'])->name('program.images.create');
        Route::post('/', [ProgramImageController::class, 'store'])->name('program.images.store');
        Route::get('/{id}/edit', [ProgramImageController::class, 'edit'])->name('program.images.edit');
        Route::put('/{id}', [ProgramImageController::class, 'update'])->name('program.images.update');
        Route::delete('/{id}', [ProgramImageController::class, 'destroy'])->name('program.images.destroy');
    });

    Route::prefix('program/{slug}/banners')->group(function () {
        Route::get('/', [ProgramBannerController::class, 'index'])->name('program.banners.index');
        Route::get('/create', [ProgramBannerController::class, 'create'])->name('program.banners.create');
        Route::post('/', [ProgramBannerController::class, 'store'])->name('program.banners.store');
        Route::get('/{id}/edit', [ProgramBannerController::class, 'edit'])->name('program.banners.edit');
        Route::put('/{id}', [ProgramBannerController::class, 'update'])->name('program.banners.update');
        Route::delete('/{id}', [ProgramBannerController::class, 'destroy'])->name('program.banners.destroy');
    });

    Route::prefix('program/{slug}/forms')->group(function () {
        Route::get('/', [FormProgramController::class, 'index'])->name('forms.index');
        Route::get('/create', [FormProgramController::class, 'create'])->name('forms.create');
        Route::post('/', [FormProgramController::class, 'store'])->name('forms.store');
        Route::get('/{id}/edit', [FormProgramController::class, 'edit'])->name('forms.edit');
        Route::put('/{id}', [FormProgramController::class, 'update'])->name('forms.update');
        Route::delete('/{id}', [FormProgramController::class, 'destroy'])->name('forms.destroy');
    });

    Route::prefix('program/{slug}/class-schedules')->group(function () {
        Route::get('/', [ClassScheduleProgramController::class, 'index'])->name('class_schedule_programs.index');
        Route::get('/create', [ClassScheduleProgramController::class, 'create'])->name('class_schedule_programs.create');
        Route::post('/', [ClassScheduleProgramController::class, 'store'])->name('class_schedule_programs.store');
        Route::get('/{id}/edit', [ClassScheduleProgramController::class, 'edit'])->name('class_schedule_programs.edit');
        Route::put('/{id}', [ClassScheduleProgramController::class, 'update'])->name('class_schedule_programs.update');
        Route::delete('/{id}', [ClassScheduleProgramController::class, 'destroy'])->name('class_schedule_programs.destroy');
    });


    Route::resource('bios', BioController::class);

    Route::prefix('bio/{slug}/links')->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('links.index');
        Route::get('/create', [LinkController::class, 'create'])->name('links.create');
        Route::post('/', [LinkController::class, 'store'])->name('links.store');
        Route::get('/{id}/edit', [LinkController::class, 'edit'])->name('links.edit');
        Route::put('/{id}', [LinkController::class, 'update'])->name('links.update');
        Route::delete('/{id}', [LinkController::class, 'destroy'])->name('links.destroy');
    });
    
    Route::resource('languages', LanguageController::class);
    Route::get('languages/{id}/translations', [TranslationController::class, 'index'])->name('languages.translations');
    Route::put('translations/update-multiple', [TranslationController::class, 'updateMultiple'])->name('translations.update_multiple');
});

require __DIR__.'/auth.php';
