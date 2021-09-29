@extends('layouts.apps.global')

@section('contents')
    <main class="content">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('topics') }}" method="POST">
                            @csrf
                            <h3 class="text-center">Form Add Topic</h3>
                            <label class="form-label">Course ID</label>
                            <input type="text" class="form-control mb-3" placeholder="5639xxxx" name="course_id" required>
                            <label class="form-label">Room ID</label>
                            <input type="text" class="form-control mb-3" placeholder="DG65xxxx" name="rooms_id" required>
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" placeholder="Tugas - 5 xxx" name="title" required>
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control mb-3" name="description" required>
                            <label class="form-label mb-3">Deadline</label>
                            <input type="datetime-local" class="form-control mb-3" name="deadline" required>
                            <label class="form-label mb-3">Nilai</label>
                            <input type="number" class="form-control mb-3" name="nilai" required>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-2">
                                <button class="btn btn-primary col-12" type="submit">SIMPAN</button>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a class="btn btn-link" class="btn btn-outline-primary col-12"
                                    href="{{ url('topics') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
