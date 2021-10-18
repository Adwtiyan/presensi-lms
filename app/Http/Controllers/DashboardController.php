<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Classrooms;

class DashboardController extends Controller
{
    public function index()
    {
        // return view('pages.test-content');
        $schedules = Schedule::cursor()->count();
        $classrooms = Classrooms::cursor()->count();
        $students = User::where('role', 'student')->cursor()->count();
        $teachers = User::where('role', 'teacher')->cursor()->count();



        return view('pages.dashboard')->with([
            'students' => $students,
            'schedules' => $schedules,
            'teachers' => $teachers,
            'classrooms' => $classrooms

        ]);
    }
}
