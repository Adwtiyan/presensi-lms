@extends('layouts.apps.global')
@section('contents')
<main class="content">
    <!-- start page title -->
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="font-size-18">Data Rooms</h4>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-primary" href="{{ route('rooms.create') }}">Add New Room</a>
        </div>
    </div>
    <!-- end page title -->

    <div class="card flex-fill mt-3">
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>id</th>
                    <th class="d-none d-xl-table-cell">Room Code</th>
                    <th class="d-none d-xl-table-cell">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $key => $room)
                <tr>
                    <td scope="row">{{ $key + 1 }}</td>
                    <td>{{ $room->room_code }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}"
                            class="btn btn-warning waves-effect waves-light">Update</a>
                        <form class="d-inline" onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                            action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger waves-effect waves-light">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
