@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3 mb-3">Form Start Absent</h1>
                        <form action="{{ route('dashboard.teachers.start-absent') }}" method="post">
                            @csrf
                            <input type="hidden" name="schedule" id="schedule">
                            <label class="col-form-label">Info / Description on Schedule</label>
                            <textarea name="info"> </textarea>
                            <input type="submit" class="btn btn-primary waves-effect waves-light float-end mt-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'info' );
    </script>
    <script>
        const params = new URLSearchParams(window.location.search);
            const scheduleID = params.get('id');
            document.getElementById("schedule").value = scheduleID;
    </script>
</main>
@endsection