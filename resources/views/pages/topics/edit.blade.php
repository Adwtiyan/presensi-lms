@extends('layouts.apps.global')

@section('contents')
    <main class="content">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('topics.update', $topic->id) }}" method="POST">
                            @csrf
                            @method('put')
                            {{-- <input type="hidden" name="_method" value="GET"> --}}
                            <h3 class="text-center">Form Edit Topic</h3>
                            <label class="form-label">ID</label>
                            <input required type="text" class="form-control mb-3" name="title" value="{{ $topic->id }}" disabled>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example" name="course_id" value="{{ $topic->course_id }}">
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            <label for="example-text-input" class="col-sm-3 col-form-label">Classroom</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example" name="classroom_id" value="{{ $topic->classroom_id }}">
                                            @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            <label class="form-label">Title</label>
                            <input required type="text" class="form-control mb-3" name="title" value="{{ $topic->title }}">
                            <label class="form-label">Description</label>
                            <textarea id="description" class="form-control" name="description" rows="10" cols="50">{{ $topic->description }}</textarea>
                            <label class="form-label mb-3">Deadline</label>
                            <input required type="datetime" id="input-datepicker" class="form-control mb-3" name="deadline" value="{{ $topic->deadline }}">
                            <label class="form-label mb-3">Value</label>
                            <input required type="number" class="form-control mb-3" name="total_point" value="{{ $topic->total_point }}">
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
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
   var description = document.getElementById("description");
     CKEDITOR.replace(description,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
@endsection
@push('additional-js')
    <script>
        new DatePicker('#input-datepicker', {
            locale: DatePickerlocaleEn,
            timepicker: true,
        })
    </script>
@endpush
