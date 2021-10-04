<?php

use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
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

Route::get('/teacher', function () {
    return view('pages.dashboard-teacher');
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

require __DIR__ . '/auth.php';
