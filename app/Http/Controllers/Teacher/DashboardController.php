<?php

namespace App\Http\Controllers\teacher;

use DateTime;
use DateTimeZone;
use DateInterval;
use App\Models\Absent;
use App\Models\Schedule;
use Hidehalo\Nanoid\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){

            if(Gate::allows('isTeacher')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function showScheduleByUserId() {
        $user_id = auth()->id();
        $schedules = Schedule::join('courses', 'courses.id', '=', 'schedules.course_id')
                    ->join('classrooms', 'classrooms.id', '=', 'schedules.classroom_id')
                    ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
                    ->where('courses.user_id', $user_id)
                    ->get(['schedules.*','courses.course_title', 'classrooms.name', 'rooms.room_code']);

        return view('teacher-dashboard.schedule')->with([
            'schedules' => $schedules
        ]);
    }

    public function createInfo() {
        return view('teacher-dashboard.info');
    }

    public function storeAbsent(Request $request){
        $minute = 90;
        $client = new Client();
        $token = $client->generateId(5);
        $start = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $finish = $now->add(new DateInterval('PT' . $minute . 'M'));

        $request->validate([
            'info' => 'required'
        ]);

        Absent::create([
            'schedule_id' => $request->schedule,
            'user_id' => auth()->id(),
            'start' => $start,
            'finish' => $finish,
            'info' => $request->info,
            'token_expired' => $finish,
            'token' => $token
        ]);

        return redirect()->route('dashboard.teachers.countdown', $token);
    }

    public function showAbsent($token) {
        return view('teacher-dashboard.absent')->with([
            'token' => $token
        ]);
    }

    public function stopAbsent($token) {
        Absent::where('token', $token)
        ->update([
            'status' => 'false'
        ]);

        return redirect()->route('teachers.dashboard');
    }
}
