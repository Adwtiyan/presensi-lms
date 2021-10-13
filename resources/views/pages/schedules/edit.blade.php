@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Update Schedule</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('schedules.update', $schedule->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Course Id</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="course_id" id="example-text-input"
                                        value="{{ $schedule->courses->course_title }}" readonly>
                                </div>
                                <br><br>
                                <label for="example-text-input" class="col-sm-3 col-form-label">Classroom Id</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="classroom_id" id="example-text-input"
                                        value="{{ $schedule->classrooms->name }}" readonly>
                                </div>
                                <br><br>
                                <label for="example-text-input" class="col-sm-3 col-form-label">Room Id</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="room_id" placeholder="Input Room Id"
                                        id="example-text-input" value="{{ $schedule->rooms->room_code }}" readonly>
                                </div>
                                <br><br>
                                <label for="example-text-input" class="col-sm-3 col-form-label">Day</label>
                                <div class="col-sm-9">
                                    <select name="day" class="custom-select">
                                        <option value="{{ $schedule->day }}" selected>{{ $schedule->day }}</option>
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
                                        placeholder="Schedule Start" id="example-text-input"
                                        value="{{ $schedule->schedule_start }}">
                                    @foreach ($errors->get('schedule_start') as $msg)
                                        <p class="text-danger">{{ $msg }}</p>
                                    @endforeach
                                </div>
                                <br><br>
                                <label for="example-text-input" class="col-sm-3 col-form-label">Schedule Finish</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="time" name="schedule_finish"
                                        placeholder="Schedule Finish" id="example-text-input"
                                        value="{{ $schedule->schedule_finish }}">
                                    @foreach ($errors->get('schedule_finish') as $msg)
                                        <p class="text-danger">{{ $msg }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pt-5">
                                <button type="submit" class="btn btn-primary waves-effect waves-light float-right"><i
                                        class="mdi mdi-file-document-box-plus mr-2"></i>Update</button>
                                <a class="btn btn-secondary" href="{{ route('schedules.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </main>
@endsection
