@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Topic</h1>
            <label>Description : {!! $topic->description !!}</label>
    </main>
@endsection
