<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\MemoController;


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

# Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

# User Setting
Route::get('/profile', [UserController::class, 'show'])->middleware(['auth'])->name('profile.show');
Route::put('/profile/{id_user}', [UserController::class, 'update'])->middleware(['auth'])->name('profile.update');

# Resource Router
Route::resource('schedules', ScheduleController::class)->middleware(['auth']);
Route::resource('classrooms', ClassroomsController::class);
Route::resource('courses', CourseController::class);
Route::resource('rooms', RoomController::class)->middleware(['auth']);
Route::resource('batches', BatchController::class);

# Resource Teacher
Route::prefix('teachers')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', [MemoController::class, 'index'])->name('teachers.dashboard');
        Route::resource('memos', MemoController::class);
    });

# Resource Student
Route::prefix('students')
    ->namespace('students')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.dashboard-student');
        })->name('students.dashboard');
    });


require __DIR__ . '/auth.php';
