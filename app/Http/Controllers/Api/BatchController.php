<?php

namespace App\Http\Controllers\Api;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return response()->json($data = $batches, $status = 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $batch = new Batch;
        $batch->name = $request->name;
        $batch->save();

        return response()->json($data = $batch, $status = 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = Batch::firstWhere('id', $id);

        if (!$batch) {
            return response()->json([
                'status' => 'failure',
                'message' => 'data unknown!'
            ], $status = 402);
        } else {
            return response()->json($data = $batch, $status = 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $batch = Batch::firstWhere('id', $id);

        if ($batch) {
            $batch->name = $request->name;
            $batch->save();

            return response()->json($data = $batch, $status = 200);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'data unknown!'
            ], $status = 402);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::firstWhere('id', $id);
        if ($batch) {
            $batch->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'data has been deleted!'
            ], $status = 204);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'data unknown!'
            ], $status = 402);
        }
    }
}
