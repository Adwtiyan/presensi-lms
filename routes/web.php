<?php

use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;

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
Route::resource('classrooms', ClassroomsController::class)->middleware(['auth']);
Route::resource('courses', CourseController::class)->middleware(['auth']);
Route::resource('rooms', RoomController::class)->middleware(['auth']);

# Resource Teacher
Route::prefix('teachers')
    ->namespace('teachers')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('pages.dashboard-teacher');
        })->name('teachers.dashboard');
        Route::get('/schedule', [DashboardController::class, 'showScheduleByUserId'])->middleware(['auth'])->name('dashboard.teachers.schedule');
        Route::get('/info', [DashboardController::class, 'createInfo'])->middleware('auth')->name('dashboard.teachers.info');
        Route::post('/start-absent', [DashboardController::class, 'storeAbsent'])->middleware('auth')->name('dashboard.teachers.start-absent');
    });

# Resource Student
// Route::prefix('students')
//     ->namespace('students')
//     ->middleware(['auth'])
//     ->group(function() {
//         Route::get('/dashboard', function () {
//             return view('pages.dashboard-students');
//         })->name('students.dashboard');
//     });

require __DIR__ . '/auth.php';
