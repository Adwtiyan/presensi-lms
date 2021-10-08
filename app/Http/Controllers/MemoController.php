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
        $memos = Memo::with('user')->get();
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
    {
        return view('pages.memos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemoRequest $request)
    {
        $user_id = auth()->id();

        $memo = new Memo;
        $memo->user_id = $user_id;
        $memo->memo = $request->memo;
        $memo->date = $request->date;
        $memo->save();

        return redirect()->route('memos.index');
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
        $memo = Memo::with('user')->where('id', $id)->first();

        return view('pages.memos.edit')->with([
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
        $user_id = auth()->id();

        $memo = Memo::findOrFail($id);
        $memo->user_id = $user_id;
        $memo->memo = $request->memo;
        $memo->date = $request->date;
        $memo->save();

        return redirect()->route('memos.index');
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

        return redirect()->route('memos.index');
    }
}
