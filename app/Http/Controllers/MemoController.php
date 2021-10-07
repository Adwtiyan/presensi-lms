<?php

namespace App\Http\Controllers;
use App\Http\Requests\MemoRequest;
use App\Models\Memo;
use App\Models\User;
use Illuminate\Http\Request;


class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Memo::with('users')->get();
        return view('pages.dashboard-teacher')->with([
            'memos' => $memos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $users = User::all();
        return view('pages.dashboardTeacher.create')->with([
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemoRequest $request)
    {
        $memo = new Memo;
        $memo->user_id = $request->user_id;
        $memo->memo = $request->memo;
        $memo->date = $request->date;
        $memo->save();

        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $memo = Memo::with('users')->where('id', $id)->first();

        return view('pages.dashboardTeacher.edit')->with([
            'memo' => $memo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemoRequest $request, $id)
    {
        $memo = Memo::findOrFail($id);
        $memo->memo = $request->memo;
        $memo->date = $request->date;
        $memo->save();

        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();

        return redirect()->route('guru.index');
    }
}
