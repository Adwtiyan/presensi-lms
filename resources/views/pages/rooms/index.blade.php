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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{ $message }}
                        </div>
                    @endif

                    @if ($message = Session::get('statusDelete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{ $message }}
                        </div>
                    @endif

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Room Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rooms as $key => $room)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td>{{ $room->room_code }}</td>
                                    <td>
                                        <a href="{{ url('rooms/'.$room->id.'/edit') }}"
                                            class="btn btn-warning waves-effect waves-light">Update</a>
                                        <form class="d-inline"
                                            onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                            action="{{ url('rooms/'.$room->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete"
                                                class="btn btn-danger waves-effect waves-light">                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    </main>

@endsection
