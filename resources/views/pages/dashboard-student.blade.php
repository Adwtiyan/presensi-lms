@extends('layouts.apps.student.student-global')
@section('contents')
    <main class="content">
        {{-- welcome dashboard --}}
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Dashboard Student</h1>
            <h5 class="text-secondary">Welcome to the dashboard</h5>
        </div>
        {{-- akhrir welcome dashboard --}}

        {{-- card --}}
        <div class="row pt-4">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="text-secondary">Schedules</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Shortcut to enter Classroom</h5>
                        <p class="card-text">View your Schedule and Start Absent </p>
                        <a href="#" class="btn btn-primary">Get In</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="text-secondary">Resumes</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Shortcut to enter Room</h5>
                        <p class="card-text">See your Resume Data</p>
                        <a href="#" class="btn btn-primary">Get In</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="text-secondary">Courses</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Shortcut to enter Course</h5>
                        <p class="card-text">View your Course and see Absent Student</p>
                        <a href="#" class="btn btn-primary">Get In</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- akhir card --}}
    </main>

@endsection
