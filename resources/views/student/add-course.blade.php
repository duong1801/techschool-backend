@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6">
            <h1>Liên kết học viên - khóa học</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary p-3">
                @include('includes.flashMessage')
                <form action="{{ route('add-course.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group pb-4">
                            <label class="mb-3">Học viên</label>
                            <select name="student_id" style="height: 40px;"
                                class="js-example-templating js-states form-control">
                                <option>Chọn học viên</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('name')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group pb-4">
                            <label class="mb-3">Khóa học</label>
                            <div class="customCheck">
                                @foreach ($courses as $course)
                                    <div class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="course_id[]"
                                            id="{{ $course->id }}" value="{{ $course->id }}">
                                        <label for="{{ $course->id }}"
                                            class="form-check-label">{{ $course->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Liên kết</button>
                </form>
            </div>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{ asset('/js/student/add-course.js') }}"></script>
@stop
