@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Add New Room</h4>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <h5 class="card-title mb-0">Room Code</h5>
                                <div class="col-sm-15 mt-3">
                                    <input class="form-control" type="text" name="room_code" placeholder="Input Room Code"
                                        id="example-text-input">
                                    @foreach ($errors->get('room_code') as $msg)
                                        <p class="text-danger">{{ $msg }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pt-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light float-right"><i
                                        class="mdi mdi-file-document-box-plus"></i>Add</button>
                                <a class="btn btn-secondary" href="{{ route('rooms.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </main>

@endsection
