<?php

use App\Events\PushAbsent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\teacher\DashboardController as TeacherDashboardController;

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
Route::get('/dashboard/cusdis', [DashboardController::class, 'cusdis'])->middleware(['auth'])->name('dashboard.cusdis');
Route::get('/dashboard/pusher', [DashboardController::class, 'test_pusher'])->middleware(['auth'])->name('dashboard.pusher');
Route::get('/pusher/created', function () {
    PushAbsent::dispatch('Hello, Malika!'); // TEST PUSHER CREATED
});

# User Setting
Route::get('/profile', [UserController::class, 'show'])->middleware(['auth'])->name('profile.show');
Route::put('/profile/{id_user}', [UserController::class, 'update'])->middleware(['auth'])->name('profile.update');

# Resource Router
Route::resource('schedules', ScheduleController::class)->middleware(['auth']);
Route::resource('classrooms', ClassroomsController::class)->middleware(['auth']);
Route::resource('courses', CourseController::class)->middleware(['auth']);
Route::resource('rooms', RoomController::class)->middleware(['auth']);
Route::resource('topics', TopicController::class);
Route::resource('batches', BatchController::class)->middleware(['auth']);

# Resource Teacher
Route::prefix('teachers')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('pages.dashboard-teacher');
        })->name('teachers.dashboard');
        Route::get('/schedules', [TeacherDashboardController::class, 'showScheduleByUserId'])->middleware(['auth'])->name('dashboard.teachers.schedules');
        Route::get('/info', [TeacherDashboardController::class, 'createInfo'])->middleware('auth')->name('dashboard.teachers.info');
        Route::post('/start-absent', [TeacherDashboardController::class, 'storeAbsent'])->middleware('auth')->name('dashboard.teachers.start-absent');
        Route::get('/countdown/{token}', [TeacherDashboardController::class, 'showAbsent'])->middleware('auth')->name('dashboard.teachers.countdown');
        Route::put('/stop-absent/{token}', [TeacherDashboardController::class, 'stopAbsent'])->middleware('auth')->name('dashboard.teachers.stop-absent');
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
        Route::get('/form-absent', [StudentDashboardController::class, 'create'])->name('students.form-absent');
        Route::post('/absent', [StudentDashboardController::class, 'store'])->name('students.absent');
        Route::get('/absent/{message}', [StudentDashboardController::class, 'message_absent'])->name('students.message-absent');
    });
// Route::post('comments', '\Laravelista\Comments\CommentController@store')->name('comments.store');
// Route::delete('comments/{comment}', '\Laravelista\Comments\CommentController@destroy')->name('comments.destroy');
// Route::put('comments/{comment}', '\Laravelista\Comments\CommentController@update')->name('comments.update');
// Route::post('comments/{comment}', '\Laravelista\Comments\CommentController@reply')->name('comments.reply');

require __DIR__ . '/auth.php';
