@extends('layouts.apps.student.student-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Absent</h1>

        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">
                            {{ $message }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection