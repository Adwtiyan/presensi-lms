@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Update Course</h1>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('courses.update', $course->id) }}" method="post">
                                @csrf
                                @method('put')
                                <h5 class="card-title mb-0">Course Name</h5>
                                <div class="mt-3 mb-3">
                                    <input type="text" class="form-control @error('course') is-invalid @enderror"
                                        placeholder="Title Course" name="course" value="{{ $course->course_title }}">
                                    @error('course')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select class="form-select @error('user') is-invalid @enderror"
                                        aria-label="Default select example" name="user">
                                        <option value="">Select Teacher</option>
                                        @foreach ($users as $key => $user)
                                            @if ($course->users->name == $user->name)
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                <a class="btn btn-secondary" href="{{ route('courses.index') }}">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
