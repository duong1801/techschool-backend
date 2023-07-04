@extends('adminlte::page')

@section('title', 'Tạo thông tin giảng viên')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Tạo thông tin giảng viên</h1>
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
                    <form action="{{ route('teacher.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tên giảng viên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" id="name" name="name"
                                    placeholder="Nhập tên giảng viên..." />
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
                                <label for="thumnail">Ảnh đại diện</label>
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

                            <div class="form-group mt-2">
                                <label for="author">Số điện thoại</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number') }}" id="phone_number" name="phone_number"
                                    placeholder="Nhập số điện thoại...">
                                @error('phone_number')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUrl1">Facebook Url</label>
                                <input type="text" name="url_social[facebook]" class="form-control" id="exampleInputUrl1"
                                    placeholder="Nhập facebook url" value="{{ old('url_social[facebook]') }}">
                                @error('url_social[facebook]')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUrl1">Tiktok Url</label>
                                <input type="text" name="url_social[tiktok]" class="form-control" id="exampleInputUrl1"
                                    placeholder="Nhập Tiktok url" value="{{ old('url[tiktok]') }}">
                                @error('url_social[tiktok]')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUrl1">Github Url</label>
                                <input type="text" name="url_social[github]" class="form-control" id="exampleInputUrl1"
                                    placeholder="Nhập Tiktok url" value="{{ old('url[tiktok]') }}">
                                @error('url_social[github]')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="box_url">


                            </div>
                            <button type="button" id="btn_create" class="btn btn-primary">Thêm link Website</button>


                            <div class="form-group mt-3">
                                <label for="my-editor">Mô tả giảng viên</label>
                                <textarea value="{{ old('description') }}" id="markdown" name="description"
                                    class="form-control @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo </button>
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
    @include('includes.convertToSlug')
    @include('includes.LaravelfileManager')
    <script src="{{ asset('/js/general/markdown.js') }}"></script>
    <script>
        $(document).ready(function() {
            //add input url
            var i = 1;
            $("#btn_create").click(function() {
                i++
                $("#box_url").append(`
                    <div class="form-group" id="form_url_${i}" >
                        <div> <label for="exampleInputWebsite1">Website Url</label></div>
                      <div class="row">
                        <div class = "col-md-11">
                            <input type="text" name="url_social[website][]" class="form-control" id="exampleInputWebsite1" placeholder="Nhập Website url">
                        </div>
                        <div class= "col-md-1">
                            <button type="button" data-index = "${i}" class="btn px-4 btn-danger btn_remove_input">Xóa</button>
                        </div>
                      </div>
                      @error('url_social[website]')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                    </div>
                `);
                   //remove input url
                $(".btn_remove_input").each(function() {
                    $(this).click(function() {
                        var index = $(this).attr('data-index')
                        console.log(index)
                        $(`#form_url_${index}`).remove()
                        if(index==i){
                            i--
                        }
                    })
                });
            });
        })
    </script>
@stop
