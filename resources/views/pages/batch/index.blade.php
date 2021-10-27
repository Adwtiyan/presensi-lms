@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Batches</h1>
            <a href="{{ route('batches.create') }}" class="btn btn-primary">Add New Batches</a>
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
                    @foreach ($batch as $key => $batches)
                    <tr>
                        <td scope = "row"> {{ $key + 1 }} </td>
                        <td>{{ $batches->id }}</td>
                        <td>{{ $batches->name }}</td>
                        <td>
                            <a href="{{ route('batches.edit', [$batches->id]) }}"
                                class="btn btn-warning waves-effect waves-light">Update</a>
                            <form class="d-inline"
                                onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                action="{{ route('batches.destroy', [$batches->id]) }}" method="POST">
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
        {{ $batch->links() }}
    </main>

@endsection
