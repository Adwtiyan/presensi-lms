@extends('layouts.apps.global')

@section('contents')
    <main class="content">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('topics.store') }}" method="POST">
                            @csrf
                            <h3 class="text-center">Form Add Topic</h3>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example" name="course_id">
                                            <option value="" selected>Select Courses</option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Classroom</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example" name="classroom_id">
                                            <option value="" selected>Select Classroom</option>
                                            @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" placeholder="Tugas - 5 xxx" name="title" required>
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control mb-3" name="description" required>
                            <label class="form-label mb-3">Deadline</label>
                            <input type="datetime" class="form-control mb-3" name="deadline" required>
                            <label class="form-label mb-3">Value</label>
                            <input type="number" class="form-control mb-3" name="total_point" required>
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
