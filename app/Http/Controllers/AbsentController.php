<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Absent;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ValidationAbsent;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.form-absent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        if ($token == null) {
            $status = false;
            $message = 'invalid token';
        } elseif ($token->status == false) {
            $status = false;
            $message = 'token expired';
        } elseif ($time_now > $token->token_expired) {
            $status = false;
            $message = 'token expired';
        } elseif ($absent_cek != null) {
            $status = false;
            $message = 'anda sudah absen';
        } else {
            $status = true;
            $message = 'absent berhasil !';
        }

        if ($status == true) {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absent  $absent
     * @return \Illuminate\Http\Response
     */
    public function show(Absent $absent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absent  $absent
     * @return \Illuminate\Http\Response
     */
    public function edit(Absent $absent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absent  $absent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absent $absent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absent  $absent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absent $absent)
    {
        //
    }

    public function message_absent($message) {
        return view('pages.students.message-absent')->with([
            'message' => $message
        ]);
    }
}
