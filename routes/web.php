<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
});

    Route::get('/quiz/{page?}', [QuizController::class, 'index']);
    Route::post('/quiz/submit', [QuizController::class, 'submit']) ->name('quiz.submit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/quiz/review/{resultId}', [QuizController::class, 'review'])->name('quiz.review');

//Admin Routes
// Route::get('/admin/questions/create', [QuestionController::class, 'create'])->name('questions.create');
// Route::post('/admin/questions', [QuestionController::class, 'store'])->name('questions.store');
// Route::get('/admin/questions', [QuestionController::class, 'index'])->name('questions.index');
// Route::get('/admin/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
// Route::put('/admin/questions/{id}', [QuestionController::class, 'update']);
// Route::delete('/admin/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
//     ->name('admin.dashboard');

    Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('questions', QuestionController::class);

});

require __DIR__.'/auth.php';
