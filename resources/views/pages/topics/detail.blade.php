@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Detail Topic</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body m-sm-3 m-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-muted">Course Name</div>
                                    <strong>{{ $topic->courses->course_title }}</strong>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-muted">Classroom Name</div>
                                    <strong>{{ $topic->classrooms->name }}</strong>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="text-muted">Deadline</div>
                                    <strong>{{ $topic->deadline }}</strong>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-muted">Title</div>
                                    <strong>
                                        {!! $topic->title !!}
                                    </strong>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-muted">Description</div>
                                    <strong>
                                        {!! $topic->description !!}
                                    </strong>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="text-muted">Total Point</div>
                                    <strong>{{ $topic->total_point }}</strong>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="text-center">
                                <a href="{{ route('topics.index') }}" class="btn btn-primary">
                                    Back to Topic
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
