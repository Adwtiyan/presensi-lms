<?php

namespace App\Http\Controllers;

use App\Models\Classrooms;
use App\Models\Course;
use App\Models\Topic;
use DateTime;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::with('courses', 'classrooms')->simplePaginate(10);
        return view('pages.topics.index')->with([
            'topics' => $topics
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = Topic::all();
        $classroom = Classrooms::all();
        $course = Course::all();
        return view('pages.topics.create')->with([
            'topics' => $topic,
            'classrooms' => $classroom,
            'courses' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $topic = new Topic;
        $topic->course_id = $request->course_id;
        $topic->classroom_id = $request->classroom_id;
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->deadline = new DateTime($request->deadline);
        $topic->total_point = $request->total_point;
        $topic->save();
        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $topic = Topic::firstWhere('id', $topic->id);
        return view('pages.topics.detail')->with([
            'topic' => $topic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($topic)
    {
        $course = Course::all();
        $classroom = Classrooms::all();
        $topic = Topic::firstWhere('id', $topic);

        return view('pages.topics.edit')->with([
            'topic' => $topic,
            'classrooms' => $classroom,
            'courses' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $topic)
    {
       $request->validate([
           'course_id' => 'required',
           'classroom_id' => 'required'
       ]);
       Topic::where('id', $topic)
       ->update([
           'course_id' => $request->course_id,
           'classroom_id' => $request->classroom_id,
           'title' => $request->title,
           'deadline' => new DateTime($request->deadline),
           'description' => $request->description,
           'total_point' => $request->total_point
       ]);
        return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic)
    {
        Topic::destroy($topic);

        return redirect()->route('topics.index');
    }
}
