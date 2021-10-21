@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Data Courses</h1>

            <div class="row align-items-center">
                <div class="col-sm-6">
                    <a class="btn btn-primary" href="{{ route('courses.create') }}">Add New Course</a>
                </div>
            </div>

            <table class="table mt-3 table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Course ID</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $key => $course)
                        <tr>
                            <td scope="row"> {{ $key + 1 }}</td>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_title }}</td>
                            <td>{{ $course->users->name }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="btn btn-warning waves-effect waves-light">Update</a>
                                <form class="d-inline"
                                    onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                    action="{{ route('courses.destroy', $course->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger waves-effect waves-light" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $courses->links() }}
    </main>
@endsection
