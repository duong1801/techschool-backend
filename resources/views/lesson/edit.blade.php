@extends('adminlte::page')

@section('title', 'Chỉnh sửa bài học')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Chỉnh sửa bài học</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">bài học</li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('lesson.update', $lesson->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $lesson->name }}" id="name" name="name"
                                    placeholder="Nhập tiêu đề..." />
                                @error('name')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Nhập link..." value="{{ $lesson->slug }}" />
                                @error('slug')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div>
                                    <label>Khóa học</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <select class="form-select form-control form-select-course" name="course_id">
                                            <option value="0">Chọn khóa học</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}" {{ $course->id == $lesson->course_id ? 'SELECTED' : '' }} >{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" id="btn_open_modal" class="btn btn-primary btn-block">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label>Nhóm bài học</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <select class="form-select form-control form-select-module" name="module_id">
                                            <option value="0">Chọn nhóm bài học</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" id="open-modal-module" class="btn btn-primary btn-block">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="document">Link tài liệu</label>
                                <input type="text" class="form-control @error('document') is-invalid @enderror"
                                    value="{{ $lesson->document }}" id="document" name="document"
                                    placeholder="Nhập link...">
                                @error('document')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group pb-4">
                                <label class="video_id">ID Video</label>
                                <select name="video_id" style="height: 40px;" id="myModal"
                                    class="js-example-templating js-states form-control">
                                    <option value="0"> Chọn ID video </option>
                                    @foreach ($idVideos as $idVideo)
                                        <option value="{{ $idVideo }}" {{ $lesson->video_id == $idVideo ? "SELECTED" : "" }}> {{ $idVideo }} </option>
                                    @endforeach
                                </select>
                                @error('video_id')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="my-editor">Mô tả</label>
                                <textarea name="description" id="markdown" class="form-control ckeditor  @error('description') is-invalid @enderror">{{ $lesson->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Trạng thái</label>
                                <select class="form-select form-control" name="status">

                                    <option @if ($lesson->status == 'charges') selected @endif value="charges">Trả phí
                                    </option>
                                    <option @if ($lesson->status == 'free') selected @endif value="free">Học thử
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('lesson.modal-course')
    @include('lesson.modal-module')
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('/js/general/markdown.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lesson/lesson.js') }}"></script>
    @include('includes.convertToSlug')
    @include('includes.LaravelfileManager')
    <script>
        $(document).ready(function() {
            $(".js-example-templating").select2();
        });
    </script>
@stop
