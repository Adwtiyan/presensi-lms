@extends('layouts.apps.global')
@section('contents')
<main class="content">
    <!-- start page title -->
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4 class="font-size-18">Form Add Schedule</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('schedules.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Course Id</label>
                            <select class="form-select" aria-label="Default select example" name="course_id">
                                <option value="" selected>Select Courses</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Classroom Id</label>
                            <select class="form-select" aria-label="Default select example" name="classroom_id">
                                <option value="" selected>Select Classroom</option>
                                @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Room Id</label>
                            <select class="form-select" aria-label="Default select example" name="room_id">
                                <option value="" selected>Select Room</option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->room_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Day</label>
                            <div class="col-sm-9">
                                <select name="day" class="custom-select">
                                    <option selected>Select Day</option>
                                    <option value="senin">senin</option>
                                    <option value="selasa">selasa</option>
                                    <option value="rabu">rabu</option>
                                    <option value="kamis">kamis</option>
                                    <option value="jumat">jumat</option>
                                    <option value="sabtu">sabtu</option>
                                </select>
                                @foreach ($errors->get('day') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Schedule Start</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="time" name="schedule_start"
                                    placeholder="Schedule Start" id="example-text-input">
                                @foreach ($errors->get('schedule_start') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <br><br>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Schedule Finish</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="time" name="schedule_finish"
                                    placeholder="Schedule Finish" id="example-text-input">
                                @foreach ($errors->get('schedule_finish') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light float-right"><i
                                    class="mdi mdi-file-document-box-plus mr-2"></i>Add</button>
                            <a class="btn btn-success" href="{{ route('schedules.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</main>
@endsection
