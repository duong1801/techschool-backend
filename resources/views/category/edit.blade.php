@extends('adminlte::page')

@section('title', 'Chỉnh sửa chuyên mục')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Chỉnh sửa chuyên mục khóa học</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">chuyên mục</li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $category->name }}" id="name" name="name"
                                    placeholder="Nhập tiêu đề..." />
                                @error('name')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Nhập link..."
                                    value="{{ $category->slug }}" />
                                @error('slug')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="my-editor">Mô tả</label>
                                <textarea  name="description" id="markdown" class="form-control  @error('description') is-invalid @enderror">{{$category->description}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
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
<script src="{{ asset('/js/general/markdown.js') }}"></script>
@include('includes.convertToSlug')
@stop
