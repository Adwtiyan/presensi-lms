@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Edit Batches</h1>
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('batches.update', [$batches->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Batch Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="batches" placeholder="Input Batch Name"
                                            id="example-text-input" value="{{ $batches->name }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light float-right"><i
                                        class="mdi mdi-file-document-box-plus mr-2"></i>Update</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </main>

@endsection
