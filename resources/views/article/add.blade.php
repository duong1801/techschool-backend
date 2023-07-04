@extends('adminlte::page')

@section('title', 'Thêm mới bài viết')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Thêm mới bài viết</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">bài viết</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('article.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" id="name" name="name"
                                    placeholder="Nhập tiêu đề..." />
                                @error('name')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Nhập link..." value="{{ old('slug') }}" />
                                @error('slug')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumnail">Hình ảnh</label>
                                <div class="input-group row m-0">
                                    <div class="pl-0 pr-4">
                                        <input id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                                            type="hidden" name="thumbnail">
                                    </div>
                                    <div class="col-3 p-0">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary btn-block">
                                                <i class="fa fa-picture-o"></i> Chọn ảnh
                                            </a>
                                        </span>

                                        <div id="holder" class="mx-auto" style="margin-top:15px;max-height:100%;"></div>

                                    </div>
                                    <div class="col-12">
                                        @error('thumbnail')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div>
                                    <label>Tag</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <select
                                            class="form-select form-control js-example-placeholder-single  js-example-templating"
                                            multiple="multiple" name="tag_id[]">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <button type="button" id="btn_modal"
                                            class="btn btn_open_modal btn-primary btn-block">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @error('category_blog_id')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label>Chuyên mục</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">
                                        <select
                                            class="form-select form-control js-example-placeholder-single  js-example-templating"
                                            multiple="multiple" name="category_blog_id[]">

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" id="btn_modal"
                                            class="btn btn_open_modal btn-primary btn-block">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @error('category_blog_id')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label>Tác giả</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="form-select form-control" name="teacher_id">
                                            <option value="">Vui long chọn tác giả</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        @error('teacher_id')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="my-editor">Mô tả bài viết</label>
                                <textarea value="{{ old('description') }}" name="description"
                                    class="form-control ckeditor  @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="my-editor">Nội dung bài viết</label>
                                <textarea value="{{ old('description') }}" name="content"
                                    class="form-control ckeditor  @error('content') is-invalid @enderror"></textarea>
                                @error('content')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo bài viết</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('/js/article/article.js') }}"></script>
    @include('includes.convertToSlug')
    @include('includes.LaravelfileManager')

@stop
