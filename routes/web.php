<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\frontend\TutorsPageController;

Route::post('/change-language', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::get('/tutors', [TutorsPageController::class, 'index'])->name('frontend.tutors.index');
Route::get('/tutors/{slug}', [TutorsPageController::class, 'detail'])->name('frontend.tutors.detail');

Route::middleware('auth')->prefix('manage')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tutors', TutorController::class);
    Route::resource('languages', LanguageController::class);
    Route::get('languages/{id}/translations', [TranslationController::class, 'index'])->name('languages.translations');
    Route::put('translations/update-multiple', [TranslationController::class, 'updateMultiple'])->name('translations.update_multiple');
});

require __DIR__.'/auth.php';
