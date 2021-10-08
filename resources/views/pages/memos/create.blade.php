@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Form Add Memo</h4>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('memos.store') }}" method="post">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="example-text-input" class="col-sm-3 col-form-label">User Id</label>
                                <select class="form-select" aria-label="Default select example" name="user_id">
                                    <option value="" selected>Select User</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                    @foreach ($errors->get('user_id') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Memo</label>
                                <div class="col-sm-9">
                                    <input type="text" name="memo" placeholder="Input Our Memo">
                                </div>
                                @foreach ($errors->get('memo') as $error)
                                <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date">
                                </div>
                                @foreach ($errors->get('date') as $error)
                                <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Add</button>
                                <a class="btn btn-success" href="{{ route('memos.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
