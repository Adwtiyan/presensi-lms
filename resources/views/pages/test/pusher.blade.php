@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <h1>PUSHER</h1>
    </main>
@endsection
@push('additional-js')
    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2a915851246c858c9ecd', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script> --}}
@endpush
