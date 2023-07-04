@extends('adminlte::page')

@section('title', 'Danh sách khóa học')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-12">
            <h1 class="ml-2">Danh sách khóa học</h1>
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
                        <a href="{{ route('course.create') }}">
                            <button class="btn btn-success">Thêm mới khóa học</button>
                        </a>
                    </div>
                    <div class="card-tools">
                        <form action="{{ route('course.index') }}" method="get">
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
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khóa học</th>
                                <th>Hình ảnh</th>
                                <th>Giảng viên</th>
                                <th>Giá gốc</th>
                                <th>Giá khuyến mại</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Số lượng bán</th>
                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($courses as $course)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" scope="row" tabindex="0">{{ $course->id }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td><img src="{{ $course->thumbnail }}" class="rounded img-fluid thumb" alt="">
                                    </td>
                                    <td>{{ $course->teacher->name }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{{ $course->discount }}</td>
                                    <td>
                                        @if ($course->status == 'comming_soon')
                                            Chưa ra mắt
                                        @else
                                            Đã ra mắt
                                        @endif
                                    </td>

                                    <td>{{ $course->created_at }}</td>
                                    <td>{{ $course->students->count() }}</td>
                                    <td>
                                        <a class="" href="{{ route('course.edit', $course->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>|@include('includes.delete', [
                                            'route' => 'course.destroy',
                                            'id' => $course->id,
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
        {{ $courses->links() }}
    </div>
@stop

@section('css')

@stop

@section('js')


@stop
