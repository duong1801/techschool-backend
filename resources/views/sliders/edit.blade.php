@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6">
            <h1>Chỉnh sửa Slider</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item">Slider</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <form action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    @include('includes.flashMessage')
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" value="{{ $slider->title }}"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                            id="title" name="title" placeholder="Nhập tiêu đề..." />
                        @error('title')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="markdown">Nội dung slider</label>
                        <textarea value="{{ old('description') }}" id="markdown" name="content"
                            class="form-control @error('description') is-invalid @enderror">{{ $slider->content }}"</textarea>
                        @error('content')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-1">
                        <label for="text_color">Màu chữ</label>
                        <input type="color" class="form-control @error('text_color') is-invalid @enderror"
                            value="{{ $slider->text_color }}" id="text_color" name="text_color"
                            placeholder="Nhập màu chữ..." />
                        @error('text_color')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumnail">Hình ảnh</label>
                        <div class="input-group row m-0">
                            <div class="pl-0 pr-4">
                                <input id="thumbnail" value="{{ $slider->thumbnail }}" class="form-control @error('thumbnail') is-invalid @enderror"
                                    type="hidden" name="thumbnail">
                            </div>
                            <div class="col-3 p-0">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-block">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>

                                <div id="holder" class="mx-auto" style="margin-top:15px;max-height:100%;">
                                    <img src="{{ $slider->thumbnail }}" alt="">
                                </div>

                            </div>
                            <div class="col-12">
                                @error('thumbnail')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="url_btn">Link button</label>
                        <input type="text" class="form-control @error('url_btn') is-invalid @enderror"
                            value="{{ $slider->url_btn }}" id="url_btn" name="url_btn" placeholder="Nhập link..." />
                        @error('url_btn')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content_btn">Nội dung button</label>
                        <input type="text" class="form-control @error('content_btn') is-invalid @enderror"
                            value="{{ $slider->content_btn }}" id="content_btn" name="content_btn"
                            placeholder="Nhập nội dung..." />
                        @error('content_btn')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="category_id">Chuyên mục</label>
                    <select class="form-select form-control" id="category_id" name="category_id">
                        <option value=""> Chọn chuyên mục </option>
                        @foreach ($categories as $category)
                            <option @if ($slider->category_id == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                    <button type="submit" class=" mt-4 btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')
    @include('includes.LaravelfileManager')
    <script src="{{ asset('/js/general/markdown.js') }}"></script>
@stop
