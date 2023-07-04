@extends('adminlte::page')

@section('title', 'Danh sách khóa học')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-6">
            <h1 class="ml-2">Danh sách bài viêt</h1>
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
                        <a href="{{ route('article.create') }}">
                            <button class="btn btn-success">Thêm mới bài viêt</button>
                        </a>
                    </div>
                    <div class="card-tools">
                        <form action="{{ route('article.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="name" value="{{ $keyword }}"
                                    class="form-control float-right" placeholder="Search">
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
                    <table class="table table-light table-hover dataTable dtr-inline mt-4 text-nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên bài viết</th>
                                <th>Hình ảnh</th>
                                <th>Tác giả</th>
                                <th>Lượt xem</th>
                                <th>Mô tả ngắn</th>
                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($articles as $article)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $article->id }}</td>
                                    <td>{{ $article->name }}</td>
                                    <td><img src="{{ $article->thumbnail }}" class="rounded img-fluid thumb" alt="">
                                    </td>
                                    <td>{{ $article->teacher->name }}</td>
                                    <td>{{ $article->view }}</td>
                                    <td>{{ $article->description }}</td>
                                    <td>
                                        <a class="" href="{{ route('article.edit', $article->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>|@include('includes.delete', [
                                            'route' => 'article.destroy',
                                            'id' => $article->id,
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
        {{ $articles->links() }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')

@stop
