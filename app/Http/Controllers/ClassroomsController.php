<?php

namespace App\Http\Controllers;

use App\Models\Classrooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Validated;

class ClassroomsController extends Controller
{
    /**
     * Construct.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function($request, $next){

            if(Gate::allows('isAdmin')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classrooms::all();

        return view('pages.classrooms.index')->with([
            'classrooms' => $classrooms
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

        return redirect()->route('classrooms.index');
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
        $classrooms = Classrooms::firstWhere('id', $classrooms);

        return view('pages.classrooms.edit')->with([
            'classroom' => $classrooms
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

        return redirect()->route('classrooms.index');
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

        return redirect()->route('classrooms.index');
    }
}
