<?php

namespace App\Http\Controllers\teacher;

use DateTime;
use DateTimeZone;
use DateInterval;
use App\Models\Absent;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Hidehalo\Nanoid\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
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

        return view('teacher-dashboard.absent')->with([
            'token' => $token
        ]);
    }
}
