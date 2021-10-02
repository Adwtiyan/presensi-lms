@extends('layouts.apps.global')

@section('contents')
    <main class="content">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('topics/'.$topic->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <h3 class="text-center">Form Add Topic</h3>
                            <label class="form-label">Course ID</label>
                            <input required type="text" class="form-control mb-3" name="course_id" value="{{ $topic->course_id }}">
                            <label class="form-label">Room ID</label>
                            <input required type="text" class="form-control mb-3" name="rooms_id" value="{{ $topic->rooms_id }}">
                            <label class="form-label">Title</label>
                            <input required type="text" class="form-control mb-3" name="title" value="{{ $topic->title }}">
                            <label class="form-label">Description</label>
                            <input required type="text" class="form-control mb-3" name="description" value="{{ $topic->description }}">
                            <label class="form-label mb-3">Deadline</label>
                            <input required type="datetime" class="form-control mb-3" name="deadline" value="{{ $topic->deadline }}">
                            <label class="form-label mb-3">Nilai</label>
                            <input required type="number" class="form-control mb-3" name="nilai" value="{{ $topic->nilai }}">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-2">
                                <button class="btn btn-primary col-12" type="submit">SIMPAN</button>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a class="btn btn-link" class="btn btn-outline-primary col-12"
                                    href="{{ url('topics') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
