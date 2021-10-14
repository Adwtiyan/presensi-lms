@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h1 class="text-center mb-3 display-4"> {{ $token }} </h1>
                        </div>
                        <div class="mx-2">
                            <div id="qrcode" class="row justify-content-center"></div>
                        </div>
                        <div class="mt-3">
                            <form onsubmit="return confirm('stop absent now?')" action="{{ route('dashboard.teachers.stop-absent', $token) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row justify-content-center">
                                    <input type="submit" name="" id="" value="STOP ABSENT" class="btn btn-danger w-50">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin-kit/js/qrcode.min.js') }}"></script>
    <script>
        new QRCode(document.getElementById("qrcode"), {
                text: "{!! $token !!}",
                width: 450,
                height: 450,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
    </script>
</main>
@endsection