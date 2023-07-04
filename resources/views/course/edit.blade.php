@extends('adminlte::page')

@section('title', 'Chỉnh sửa khóa học')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Chỉnh sửa khóa học</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">khóa học</li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $course->name }}" id="name" name="name"
                                    placeholder="Nhập tiêu đề..." />
                                @error('name')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Nhập link..." value="{{ $course->slug }}" />
                                @error('slug')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumnail">Hình ảnh</label>
                                <div class="input-group row m-0">
                                    <div class=" pl-0 pr-4">
                                        <input id="thumbnail" value="{{ $course->thumbnail }}"
                                            class="form-control @error('thumbnail') is-invalid @enderror" type="hidden"
                                            name="thumbnail">
                                    </div>
                                    <div class="col-3 p-0">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary btn-block">
                                                <i class="fa fa-picture-o"></i> Chọn ảnh
                                            </a>
                                        </span>
                                        <div id="holder" style="margin-top:15px;max-height:100%;">
                                            <img src="{{ $course->thumbnail }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        @error('thumbnail')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="author">Giảng viên</label>
                                <select class="form-select form-control" name="teacher_id">
                                    <option value="">
                                        Chọn giảng viên </option>
                                    @foreach ($teachers as $teacher)
                                        <option @if ($teacher->id == $course->teacher_id) selected @endif
                                            value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                                    @endforeach

                                </select>
                                @error('teacher_id')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Giá gốc</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ $course->price }}" id="price" name="price" placeholder="Nhập giá...">
                                @error('price')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="discount">Giá khuyến mại</label>
                                <input type="text" class="form-control @error('discount') is-invalid @enderror"
                                    value="{{ $course->discount }}" id="discount" name="discount"
                                    placeholder="Nhập giá...">
                                @error('discount')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="my-editor">Mô tả</label>
                                <textarea name="description" id="markdown" class="form-control @error('description') is-invalid @enderror">{{ $course->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div>
                                    <label>Chuyên mục khóa học</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">

                                        <select class="form-select form-control form-select-category" name="category_id">
                                            @foreach ($categories as $category)
                                                <option @if ($category->id == $course->category_id) selected @endif
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <div class="form-group mb-4">
                                <label>Trạng thái</label>
                                <select class="form-select form-control" name="status">
                                    <option {{ $course->status == 'comming_soon' ? 'selected' : '' }} value="comming_soon">Sắp ra
                                        mắt </option>
                                    <option {{ $course->status == 'debuted' ? 'selected' : '' }} value="debuted">Đã ra mắt
                                    </option>
                                </select>
                            </div>

                            <div class="form-group pt-4 icheck-primary">
                                <input type="checkbox" @if ($course->featured == 1) checked @endif value="1"
                                    id="checkboxPrimary3" name="featured">
                                <label for="checkboxPrimary3">
                                    Khóa học nổi bật
                                </label>
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
    @include('course.modal')
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('/js/general/markdown.js') }}"></script>
    <script src="{{ asset('/js/general/modal.js') }}"></script>
    @include('includes.convertToSlug')
    @include('includes.LaravelfileManager')
@stop
