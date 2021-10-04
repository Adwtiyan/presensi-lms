<?php

use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\CourseController;
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

Route::get('/test', function () {
    return view('pages.test-content');
});

Route::get('/teacher', function () {
    return view('pages.dashboard-teacher');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('pages.test-content');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [UserController::class, 'show'])->name('profile.show')->middleware(['auth']);
Route::put('/profile/{id_user}', [UserController::class, 'update'])->name('profile.update')->middleware(['auth']);

Route::resource('schedules', ScheduleController::class)->middleware(['auth']);
Route::resource('classrooms', ClassroomsController::class)->middleware(['auth']);
Route::resource('courses', CourseController::class)->middleware(['auth']);
Route::resource('rooms', RoomController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
