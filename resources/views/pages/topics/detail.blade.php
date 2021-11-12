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

                            <div class="row mb-4">
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
                            <div class="text-center">
                                <a href="{{ route('topics.index') }}" class="btn btn-primary">
                                    Back to Topic
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 mx-auto">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $topic->id }}" readonly>
                    <label for="floatingInput">ID</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{  $topic->courses->course_title }}" readonly>
                    <label for="floatingPassword">Course ID</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $topic->classrooms->name }}" readonly>
                    <label for="floatingPassword">Classroom ID</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $topic->title }}" readonly>
                    <label for="floatingPassword">Title</label>
                  </div>
                  <div class="form-floating mb-3">
                    <div>{!! $topic->description !!}</div>
                    <label for="floatingPassword">Description</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $topic->deadline }}" readonly>
                    <label for="floatingPassword">Deadline</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $topic->total_point }}" readonly>
                    <label for="floatingPassword">Total Point</label>
                  </div>
            </div> --}}
    </main>
@endsection
