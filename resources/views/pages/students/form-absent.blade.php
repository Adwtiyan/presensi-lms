@extends('layouts.apps.student.student-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Absent</h1>

        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('students.absent') }}" method="post">
                            @csrf
                            <div class="mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="Absent Code" name="token">
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection