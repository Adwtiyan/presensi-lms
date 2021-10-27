@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">topics</h1>
            <a href="{{ route('topics.create') }}" class="btn btn-primary">Add New topics</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name Batch</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope = "row">1</td>
                        <td>{{ $topics->id }}</td>
                        <td>{{ $topics->title }}</td>
                        <td>
                            <a href="{{ route('topics.edit', [$topics->id]) }}"
                                class="btn btn-warning waves-effect waves-light">Update</a>
                            <form class="d-inline"
                                onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                action="{{ route('topics.destroy', [$topics->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete"
                                    class="btn btn-danger waves-effect waves-light">
                                {{-- <button type="submit">Delete</button>
                                --}}
                            </form>
                        </td>
                    </tr>
                </tbody>
              </table>
        </div>

        @comments(['model' => $topics])
    </main>

@endsection
