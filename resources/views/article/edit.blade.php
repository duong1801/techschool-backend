@extends('adminlte::page')

@section('title', 'Chỉnh sửa bài viết')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Chỉnh sửa bài viết</h1>
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
                    <form action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $article->name }}" id="name" name="name"
                                    placeholder="Nhập tiêu đề..." />
                                @error('name')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Nhập link..." value="{{ $article->slug }}" />
                                @error('slug')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumnail">Hình ảnh</label>
                                <div class="input-group row m-0">
                                    <div class=" pl-0 pr-4">
                                        <input id="thumbnail" value="{{ $article->thumbnail }}"
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
                                            <img src="{{ $article->thumbnail }}" alt="">
                                        </div>
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
                                                <option
                                                    @foreach ($article->tags as $selected)
                                                    @if ($tag->id == $selected->id)
                                                         selected
                                                    @endif @endforeach
                                                    value="{{ $tag->id }}"> {{ $tag->name }}</option>
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
                                                <option
                                                    @foreach ($article->categoryBlogs as $selected)
                                                    @if ($category->id == $selected->id)
                                                         selected
                                                    @endif @endforeach
                                                    value="{{ $category->id }}"> {{ $category->name }}</option>
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
                                            <option value="">Vui lòng chọn</option>
                                            @foreach ($teachers as $teacher)
                                                <option @if ($teacher->id == $article->teacher->id)
                                                    selected
                                                @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                <textarea name="description" class="form-control ckeditor  @error('description') is-invalid @enderror">{{ $article->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="my-editor">Nội dung bài viết</label>
                                <textarea name="content" class="form-control ckeditor  @error('content') is-invalid @enderror">{{ $article->content }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Chỉnh sửa bài viết</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/js/article/article.js') }}"></script>

    @include('includes.convertToSlug')
    @include('includes.LaravelfileManager')
@stop
