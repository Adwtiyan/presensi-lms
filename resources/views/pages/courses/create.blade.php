@extends('layouts.apps.global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Add Data Courses</h1>

        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Input</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control @error('course') is-invalid @enderror" placeholder="Title Course" name="course">
                                @error('course')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select class="form-select @error('user') is-invalid @enderror" aria-label="Default select example" name="user">
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

                            <button type="submit" class="btn btn-primary float-end">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection