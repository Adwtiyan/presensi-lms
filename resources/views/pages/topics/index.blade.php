@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Topic</h1>
            <a href="{{ route('topics.create') }}" class="btn btn-primary">Add New Topic</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Course</th>
                    <th scope="col">Classroom</th>
                    <th scope="col">Title</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Total Point</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $key => $topic)
                    <tr>
                        <td scope = "row"> {{ $key + 1 }} </td>
                        <td>{{ $topic->id }}</td>
                        <td>{{ $topic->courses->course_title }}</td>
                        <td>{{ $topic->classrooms->name }}</td>
                        <td>{{ $topic->title }}</td>
                        <td>{{ $topic->deadline }}</td>
                        <td>{{ $topic->description }}</td>
                        <td>{{ $topic->total_point }}</td>
                        <td>
                            <a href="{{ route('topics.edit', [$topic->id]) }}"
                                class="btn btn-warning waves-effect waves-light">Update</a>
                            <form class="d-inline"
                                onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                action="{{ route('topics.destroy', [$topic->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete"
                                    class="btn btn-danger waves-effect waves-light">
                                {{-- <button type="submit">Delete</button>
                                --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
    </main>

@endsection
