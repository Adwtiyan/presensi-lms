<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Classrooms;

use App\Events\PushAbsent;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){

            if(Gate::allows('isAdmin')) return $next($request);
            if(Gate::allows('isTeacher')) {
                return redirect()->route('teachers.dashboard');
            }
            if(Gate::allows('isStudent')) {
                return redirect()->route('students.dashboard');
            }

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

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

    public function cusdis()
    {
        return view('pages.test.cusdis');
    }

    public function test_pusher()
    {
        return view('pages.test.pusher');
    }
}
