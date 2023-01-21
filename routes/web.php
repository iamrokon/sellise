<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/course/{id}', [CourseController::class, 'show'])->name('course');
Route::get('/books', [CourseController::class, 'index'])->name('courses');
// Route::get('/topics/{slug}', [TopicController::class, 'index'])->name('topics');
// Route::get('/{archive_type}/{slug}', [HomeController::class, 'archive'])->name('archive');
Route::get('/courses', [CourseController::class, 'courses'])->name('courses');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';
