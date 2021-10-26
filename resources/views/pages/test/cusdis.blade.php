@extends('layouts.apps.global')
@section('contents')
    <main class="content">
        <h1>CUSDIS</h1>
        <hr>
        <div id="cusdis_thread" data-host="https://cusdis.com" data-app-id="6166e183-ac48-4b81-b492-b12d548fae5f"
            data-page-id="1" data-page-url="http://localhost:8000/dashboard/cusdis" data-page-title="cusdis">
        </div>
    </main>
@endsection
@push('additional-js')
<script async defer src="https://cusdis.com/js/cusdis.es.js"></script>
@endpush
