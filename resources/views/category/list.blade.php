@extends('adminlte::page')

@section('title', 'Danh sách chuyên mục')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-6">
            <h1 class="ml-2">Danh sách chuyên mục</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.flashMessage')
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-success">Thêm mới chuyên mục</button>
                        </a>
                    </div>
                    <div class="card-tools">
                        <form action="{{ route('category.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="name" value="{{ $keyword }}" class="form-control float-right"
                                    placeholder="Search">
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
                                <th>STT</th>
                                <th>Tên chuyên mục</th>
                                <th>Khóa học</th>
                                <th>Ngày tạo</th>

                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @foreach ($category->courses as $course)
                                            <p>{{ $course->name }}<br></p>
                                        @endforeach
                                    </td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a class="" href="{{ route('category.edit', $category->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>|@include('includes.delete', [
                                            'route' => 'category.destroy',
                                            'id' => $category->id,
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
    <div class="col-12">
        {{ $categories->links() }}
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
