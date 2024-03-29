@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Classrooms</h1>
            <a href="{{ route('classrooms.create') }}" class="btn btn-primary">Add New Classroom</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Name Classroom</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($classrooms as $classroom)
                    <tr>
                        <td>{{ $classroom->id }}</td>
                        <td>{{ $classroom->batch->name }}</td>
                        <td>{{ $classroom->name }}</td>
                        <td>
                            {{-- <a href="{{route('batches.index',[$classroom->batch->id])}}"
                                class="btn btn-primary waves-effect waves-light"> Batch</a> --}}
                            <a href="{{ route('classrooms.edit', [$classroom->id]) }}"
                                class="btn btn-warning waves-effect waves-light">Update</a>
                            <form class="d-inline"
                                onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                action="{{ route('classrooms.destroy', [$classroom->id]) }}" method="POST">
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
        </div>
        {{ $classrooms->links() }}
    </main>

@endsection
