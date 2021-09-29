<?php

namespace App\Http\Controllers;

use App\Models\Topic;
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
        $topics = Topic::all();
        return view('pages.topics.index', compact( //compact untuk melempar data var
            'topics'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = Topic::all();
        return view('pages.topics.create', compact( //compact untuk melempar data var
            'topic'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->course_id = $request->course_id;
        $topic->rooms_id = $request->rooms_id;
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->deadline = $request->deadline;
        $topic->nilai = $request->nilai;
        $topic->save();

        return redirect('topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $topic = Topic::find($id); //menemukan berdasarkn id
        return view('pages.topics.edit', compact(
            'topic'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $topic = Topic::find($id);
        $topic->course_id = $request->course_id;
        $topic->rooms_id = $request->rooms_id;
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->deadline = $request->deadline;
        $topic->nilai = $request->nilai;
        $topic->save();

        return redirect('topics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return redirect('topics');
    }
}
