<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoomController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/show-profile', [UserController::class, 'edit'])->name('show-profile');
Route::put('/update-profile/{id_user}', [UserController::class, 'update'])->name('update-profile');

Route::resource('courses', CourseController::class);
Route::resource('rooms', RoomController::class);

require __DIR__ . '/auth.php';