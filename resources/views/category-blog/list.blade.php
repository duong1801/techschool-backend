@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6">
            <h1>Danh sách chuyên mục (blog)</h1>
        </div>
    </div>
    @if (Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
    </div>
@endif
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{ route('category-blog.create') }}">
                        <button class="btn btn-success">Thêm mới chuyên mục</button>
                    </a>
                </div>
                <div class="card-tools">
                    <form action="{{ route('category-blog.index') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="name" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên chuyên mục</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriesBlog as $key => $categoryBlog)
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $categoryBlog->name }}</td>
                                <td>{!! $categoryBlog->description !!}</td>
                                <td class="d-flex">
                                    <a class="mr-2" href="{{ route('category-blog.edit', $categoryBlog->id) }}">
                                        <button class="btn btn-warning">Sửa</button>
                                    </a>
                                    @include('includes.delete', [
                                        'route' => 'category-blog.destroy',
                                        'id' => $categoryBlog->id,
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        {!! $categoriesBlog->links() !!}
    </div>
@endsection
