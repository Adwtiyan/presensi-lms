@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Add New Course</h1>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('courses.store') }}" method="post">
                                @csrf
                                <h5 class="card-title mb-0">Course Name</h5>
                                <div class="mt-3 mb-3">
                                    <input type="text" class="form-control @error('course') is-invalid @enderror"
                                        placeholder="Title Course" name="course">
                                    @error('course')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select class="form-select @error('user') is-invalid @enderror"
                                        aria-label="Default select example" name="user">
                                        <option value="" selected>Select Teacher</option>
                                        @foreach ($users as $key => $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Add</button>
                                <a class="btn btn-secondary" href="{{ route('courses.index') }}">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
