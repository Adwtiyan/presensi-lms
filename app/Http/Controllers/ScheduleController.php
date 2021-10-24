<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Classrooms;
use App\Http\Requests\ScheduleRequest;
// use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with('courses','classrooms','rooms')->get();
        return view('pages.schedules.index')->with([
            'schedules' => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $classrooms = Classrooms::all();
        $rooms = Room::all();
        return view('pages.schedules.create')->with([
            'courses' => $courses,
            'classrooms' => $classrooms,
            'rooms' => $rooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $schedule = new Schedule;
        $schedule->course_id = $request->course_id;
        $schedule->classroom_id = $request->classroom_id;
        $schedule->room_id = $request->room_id;
        $schedule->day = $request->day;
        $schedule->schedule_start = $request->schedule_start;
        $schedule->schedule_finish = $request->schedule_finish;
        $schedule->save();

        return redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $schedule = Schedule::with('courses', 'classrooms', 'rooms')->where('id', $schedule->id)->first();
        // $schedule = Schedule::findOrFail($schedule->id);
        return view('pages.schedules.edit')->with([
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $schedule = Schedule::findOrFail($schedule->id);
        $schedule->day = $request->day;
        $schedule->schedule_start = $request->schedule_start;
        $schedule->schedule_finish = $request->schedule_finish;
        $schedule->save();

        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule = Schedule::findOrFail($schedule->id);
        $schedule->delete();

        return redirect()->route('schedules.index');
    }
}