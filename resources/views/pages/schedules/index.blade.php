@extends('layouts.apps.global')
@section('contents')
<main class="content">
    <!-- start page title -->
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4 class="font-size-18">Data Schedules</h4>
            </div>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-primary" href="{{ route('schedules.create') }}">Add New Schedule</a>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Schedule ID</th>
                                <th>Course Title</th>
                                <th>Classroom</th>
                                <th>Room Code</th>
                                <th>Day</th>
                                <th>Start</th>
                                <th>Finish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $key => $schedule)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $schedule->id }}</td>
                                <td>{{ $schedule->courses->course_title }}</td>
                                <td>{{ $schedule->classrooms->name }}</td>
                                <td>{{ $schedule->rooms->room_code }}</td>
                                <td>{{ $schedule->day }}</td>
                                <td>{{ $schedule->schedule_start }}</td>
                                <td>{{ $schedule->schedule_finish }}</td>
                                <td>
                                    <a href="" class="btn btn-info waves-effect waves-light">Start Absent</a>
                                    <a href="{{ route('schedules.edit', $schedule->id) }}"
                                        class="btn btn-warning waves-effect waves-light">Update</a>
                                    <form class="d-inline"
                                        onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                        action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete"
                                            class="btn btn-danger waves-effect waves-light">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</main>

@endsection
