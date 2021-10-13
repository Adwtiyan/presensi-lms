@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Add New Classroom</h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('classrooms.store') }}" method="post">
                                @csrf
                                <h5 class="card-title mb-0">Classroom Name</h5>
                                <div class="form-group row mt-3 mb-3">
                                    <div class="col-sm-15">
                                        <input class="form-control" type="text" name="classrooms"
                                            placeholder="Input Classroom Name" id="example-text-input">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light float-right"><i
                                        class="mdi mdi-file-document-box-plus mr-2"></i>Add</button>
                                <a class="btn btn-secondary" href="{{ route('classrooms.index') }}">Back</a>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </main>

@endsection
