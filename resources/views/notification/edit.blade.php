@extends('adminlte::page')

@section('title', 'Tạo thông báo hệ thống')

@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">Thêm mới thông báo hệ thống</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thông báo</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('notification.update', $notification->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        @include('includes.flashMessage')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $notification->title }}" id="title" name="title"
                                    placeholder="Nhập tiêu đề..." />
                                @error('title')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="my-editor">Nội dung thông báo</label>
                                <textarea value="{{ old('content') }}" id="markdown" name="content"
                                    class="form-control  @error('content') is-invalid @enderror">{{ $notification->content }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <div class="col-md-4">
                                    <div class="input-group date" id="datepicker">
                                        <input type="datetime-local" value="{{ $notification->expired }}" name="expired"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group pt-4 icheck-primary">
                                <input type="checkbox" value="1" @if ($notification->is_send_mail == 1) checked @endif
                                    id="checkboxPrimary3" name="is_send_mail">
                                <label for="checkboxPrimary3">
                                    Gửi mail
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('/js/general/markdown.js') }}"></script>
@stop
