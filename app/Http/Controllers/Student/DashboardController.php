<?php

namespace App\Http\Controllers\Student;

use DateTime;
use DateTimeZone;
use App\Models\Absent;
use App\Models\Schedule;
use App\Models\ValidationAbsent;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function create()
    {
        return view('pages.students.form-absent');
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $user_id = auth()->id();
        $token = Absent::firstWhere('token', $request->token);
        $absent_cek = ValidationAbsent::where('token', $request->token)->where('user_id', $user_id)->first();
        $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $time_now = $time->format('Y-m-d H:i:s');


        switch (true) {
            case !$token:
                $status = false;
                $message = 'invalid token';
                break;
            case !$token->status:
                $status = false;
                $message = 'token expired';
                break;
            case $time_now > $token->token_expired:
                $status = false;
                $message = 'token expired';
                break;
            case $absent_cek:
                $status = false;
                $message = 'anda sudah absen';
                break;
            default:
                $status = true;
                $message = 'absent berhasil !';
                break;
        }

        if ($status) {
            $course = Schedule::firstWhere('id', $token->schedule_id);

            ValidationAbsent::create([
                'user_id' => $user_id,
                'course_id' => $course->course_id,
                'token' => $request->token,
                'time' => $time
            ]);
        }

        return redirect()->route('students.message-absent', $message);
    }

    public function message_absent($message)
    {
        return view('pages.students.message-absent')->with([
            'message' => $message
        ]);
    }
}
