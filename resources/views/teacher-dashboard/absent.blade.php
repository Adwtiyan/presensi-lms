<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/admin-kit/img/icons/icon-48x48.png') }}" />

    <title>Amikom Center</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    @include('includes.css')
</head>

<body style="background-color: #fff">
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <!-- QRCODE -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body w-50 mx-auto">
                            <div class="border border-2 border-dark mb-4">
                                <h1 class="text-center"> {{ $token }} </h1>
                            </div>
                            <div class="mx-2">
                                <div id="qrcode" class="row justify-content-center"></div>
                            </div>
                            <div class="border mt-4 border-2 border-dark pt-2">
                                <h1 id="time" class="row justify-content-center"></h1>
                            </div>
                            <div class="mt-3">
                                <form onsubmit="return confirm('stop absent now?')"
                                    action="{{ route('dashboard.teachers.stop-absent', $token) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row justify-content-center">
                                        <input type="submit" name="" id="" value="STOP ABSENT"
                                            class="btn btn-danger w-50">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END QRCODE -->

                <!-- TABLE LIST ABSENT -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body mx-auto">
                            <div class="mb-4">
                                <h1 class="text-center"> LIST PARTICIPANTS PRESENT </h1>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->user->name }}</td>
                                            <td>{{ $d->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END TABLE LIST ABSENT -->
            </div>
        </div>
    </main>
    @include('includes.js')

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

    <script>
        let attr_user;
        Echo.channel("{!! $token !!}").listen('PushAbsent', (data) => {
            attr_user = data.attrs;
            document.querySelector('tbody').insertAdjacentHTML('beforeend',
                `<tr>
                    <td>${attr_user.name}</td>
                    <td>${attr_user.time.date}</td>
                </tr>`)
        });
    </script>

</body>

</html>
