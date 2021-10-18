@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">

        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border border-dark pt-2">
                            <h1 id="time" class="row justify-content-center"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

    <script type="text/javascript">
        function startTimer(duration, display) {
                var timer = duration,
                    minutes, seconds;
                setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);
    
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
    
                    display.textContent = minutes + ":" + seconds;
    
                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 1000);
            }
    
            window.onload = function() {
                var fiveMinutes = 60 * 45 * 2,
                    display = document.querySelector('#time');
                startTimer(fiveMinutes, display);
            };
    
    </script>

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