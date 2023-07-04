@extends('adminlte::page')

@section('title', 'Chỉnh sửa nhóm bài học')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Chỉnh sửa nhóm bài học</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">nhóm bài học</li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('module.update', $module->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $module->name }}" id="name" name="name"
                                    placeholder="Nhập tiêu đề..." />
                                @error('name')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Nhập link..." value="{{ $module->slug }}" />
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
                                        <select class="form-select form-control" name="course_id">
                                            <option value="">Chọn khóa học</option>
                                            @foreach ($courses as $course)
                                                <option @if ($course->id == $module->course_id) selected @endif
                                                    value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" id="btn_open_modal" class="btn btn-primary btn-block">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="my-editor">Mô tả</label>
                                <textarea name="description" id="markdown" class="form-control @error('description') is-invalid @enderror">{{ $module->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
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
@include('module.modal')
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('/js/general/markdown.js') }}"></script>
    <script src="{{ asset('/js/general/modal.js') }}"></script>
    @include('includes.convertToSlug')
@stop
