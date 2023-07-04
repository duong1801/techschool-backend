@extends('adminlte::page')

@section('title', 'Danh sách giảng viên')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-6">
            <h1 class="ml-2">Danh sách giảng viên</h1>
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
                        <a href="{{ route('teacher.create') }}">
                            <button class="btn btn-success">Thêm mới</button>
                        </a>
                    </div>
                    <div class="card-tools">
                        <form action="{{ route('teacher.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="name" value=""
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
                                <th>Tên giảng viên</th>
                                <th>Avatar</th>
                                <th>Mô tả</th>
                                <th>Số điện thoại</th>
                                <th>Khóa học</th>
                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($teachers as $teacher)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $teacher->id }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td><img src="{{ $teacher->thumbnail }}" class="rounded img-fluid thumb" alt="avatar">
                                    </td>
                                    <td>{{ $teacher->description }}</td>
                                    <td>{{ $teacher->phone_number }}</td>
                                    <td>
                                        @foreach ($teacher->courses as $course)
                                            {{ $course->name }}
                                        @endforeach
                                    </td>
                                    <td>20</td>
                                    <td>
                                        <a class="" href="{{ route('teacher.edit', $teacher->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>|@include('includes.delete', [
                                            'route' => 'teacher.destroy',
                                            'id' => $teacher->id,
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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')

@stop
