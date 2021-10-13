@extends('layouts.apps.global')

@section('contents')
    <main class="content">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Data Topics</h4>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary" href="{{ url('topics/create') }}">Add New Topic</a>
            </div>
        </div>

        <div class="card flex-fill mt-3">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course ID</th>
                        <th>ClassRoom ID</th>
                        <th>Title</th>
                        <th class="d-none d-xl-table-cell">Desc</th>
                        <th>Deadline</th>
                        <th>Value</th>
                        <th class="d-none d-xl-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $key => $value)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $value->course->course_title }}</td>
                            <td>{{ $value->room_id }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->deadline }}</td>
                            <td>{{ $value->value }}</td>
                            <td>
                                <a href="{{ url('topics/' . $value->id . '/edit') }}"
                                    class="btn btn-warning waves-effect waves-light">Update</a>
                                <form class="d-inline" action="{{ url('topics/' . $value->id) }}" method="POST"
                                    onsubmit="return confirm('Data will be Deleted, Are you sure?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit"
                                        class="btn btn-danger waves-effect waves-light">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>


@endsection
