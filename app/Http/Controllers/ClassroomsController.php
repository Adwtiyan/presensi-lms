<?php

namespace App\Http\Controllers;

use App\Models\Classrooms;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.classrooms.index')->with([
            'classrooms'=>Classrooms::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.classrooms.create');
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
            'classrooms'=>'required'
        ]);
        Classrooms::create([
            'name' => $request->classrooms
        ]);
        return redirect('/classrooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function show(Classrooms $classrooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function edit($classrooms)
    {
        return view('pages.classrooms.edit')->with([
            'classroom' => Classrooms::firstWhere('id', $classrooms)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $classrooms)
    {
        $request->validate([
            'classrooms'=>'required'
        ]);
        Classrooms::where('id',$classrooms)
        ->update([
            'name'=>$request->classrooms
        ]);
        return redirect('/classrooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function destroy($classrooms)
    {
        Classrooms::destroy($classrooms);
        return redirect('/classrooms');
    }
}
