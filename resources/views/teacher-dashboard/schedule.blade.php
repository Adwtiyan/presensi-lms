@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Schedule</h1>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Classroom</th>
                    <th scope="col">Rooms</th>
                    <th scope="col">Day</th>
                    <th scope="col">Time Schedule</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $key => $schedule)
                <tr>
                    <td scope="row"> {{ $key + 1 }}</td>
                    <td>{{ $schedule->course_title }}</td>
                    <td>{{ $schedule->name }}</td>
                    <td>{{ $schedule->room_code }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ $schedule->schedule_start }} - {{ $schedule->schedule_finish }}</td>
                    <td>
                        <a href="{{ route('dashboard.teachers.info', ['id' => $schedule->id]) }}"
                            class="btn btn-primary waves-effect waves-light">Start Absent</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection