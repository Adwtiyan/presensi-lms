@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <h1>PUSHER</h1>
    </main>
@endsection
@push('additional-js')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
        Echo.channel('push-absent').listen('PushAbsent', (data) => {
            console.log('Success!');
            console.log(data);
        });
    </script>
@endpush
