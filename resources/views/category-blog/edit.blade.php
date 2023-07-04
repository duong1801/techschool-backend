@extends('adminlte::page')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $title }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="http://localhost:8000/home">Trang chủ</a></li>
                <li class="breadcrumb-item">{{ $title }}</li>
            </ol>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{ route('category-blog.update', $categoryBlog->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFullName">Họ và tên</label>
                            <input name="name" type="text" class="form-control" id="exampleInputFullName"
                                placeholder="Tên chuyên mục" value="{{ $categoryBlog->name }}">
                            @error('name')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="my-editor">Mô tả</label>
                            <textarea class="ckeditor" value="{{ old('description') }}" name="description"
                                class="form-control  @error('description') is-invalid @enderror">{{ $categoryBlog->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('includes.LaravelfileManager')
@stop

