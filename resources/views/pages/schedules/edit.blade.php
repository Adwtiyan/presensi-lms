@extends('layouts.apps.global')
@section('contents')
<main class="content">
    <!-- start page title -->
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4 class="font-size-18">Form Edit Schedule</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Course Id</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="course_id" placeholder="Input Course id"
                                    id="example-text-input" value="{{ $schedule->course_id }}">
                                @foreach ($errors->get('course_id') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Classroom Id</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="classroom_id"
                                    placeholder="Input Classroom Id" id="example-text-input"
                                    value="{{ $schedule->classroom_id }}">
                                @foreach ($errors->get('classroom_id') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Room Id</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="room_id" placeholder="Input Room Id"
                                    id="example-text-input" value="{{ $schedule->room_id }}">
                                @foreach ($errors->get('room_id') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Day</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="day" placeholder="Input day"
                                    id="example-text-input" value="{{ $schedule->day }}">
                                @foreach ($errors->get('day') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Schedule Start</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="schedule_start"
                                    placeholder="Schedule Start" id="example-text-input"
                                    value="{{ $schedule->schedule_start }}">
                                @foreach ($errors->get('schedule_start') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Schedule Finish</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="schedule_finish"
                                    placeholder="Schedule Finish" id="example-text-input"
                                    value="{{ $schedule->schedule_finish }}">
                                @foreach ($errors->get('schedule_finish') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light float-right"><i
                                    class="mdi mdi-file-document-box-plus mr-2"></i>Edit</button>
                            <a class="btn btn-success" href="{{ route('schedules.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</main>
@endsection
