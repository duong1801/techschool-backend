@extends('adminlte::page')

@section('title', 'Danh sách bài học')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-12">
            <h1 class="ml-2">Danh sách bài học</h1>
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
                        <a href="{{ route('lesson.create') }}">
                            <button class="btn btn-success">Thêm mới khóa học</button>
                        </a>
                    </div>
                    <div class="card-tools">
                        <form action="{{ route('lesson.index') }}" method="get">
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
                                <th>Tên bài học</th>
                                <th>Slug</th>
                                <th>Nhóm bài học</th>
                                <th>Khóa học</th>
                                <th>Ngày tạo</th>
                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lessons as $lesson)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $lesson->id }}</td>
                                    <td>{{ $lesson->name }}</td>
                                    <td>{{ $lesson->slug }}</td>
                                    <td>Nhóm bài học</td>
                                    <td>Khóa học</td>
                                    <td>{{ $lesson->created_at }}</td>

                                    <td>
                                        <a class="" href="{{ route('lesson.edit', $lesson->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>|@include('includes.delete', [
                                            'route' => 'lesson.destroy',
                                            'id' => $lesson->id,
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
@stop

@section('css')
  
@stop

@section('js')

@stop
