@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center"> {{ $token }} </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection