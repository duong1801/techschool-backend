@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6">
            <h1>Tags</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item">{{ $title }}</li>
            </ol>
        </div>
    </div>
    @if (Session::has('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg') }}
        </div>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="form-group">
            <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFullName">Tên tag</label>
                        <input name="name" type="text" class="form-control" id="exampleInputFullName"
                            placeholder="Tên chuyên mục" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="my-editor">Mô tả</label>
                        <textarea class="ckeditor" value="{{ old('description') }}" name="description"
                            class="form-control  @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm tag</button>
                </div>
            </form>
        </div>
        <div class="card-header">
            <h3>Danh sách tag</h3>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tag</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $key => $tag)
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->description }}</td>
                                <td class="d-flex">
                                    <a class="mr-2" href="{{ route('tag.edit', $tag->id) }}">
                                        <button class="btn btn-warning">Sửa</button>
                                    </a>
                                    @include('includes.delete', [
                                        'route' => 'tag.destroy',
                                        'id' => $tag->id,
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    </div>
@endsection


@section('js')
    @include('includes.LaravelfileManager')
@stop
