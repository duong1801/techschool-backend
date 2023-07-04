@extends('adminlte::page')

@section('title', 'Danh sách nhóm bài học')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-6">
            <h1 class="ml-2">Danh sách nhóm bài học</h1>
        </div>
    @stop

    @section('content')
        <div class="row">
            <div class="col-md-12">
                @include('includes.flashMessage')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{ route('module.create') }}">
                                <button class="btn btn-success">Thêm mới nhóm bài học</button>
                            </a>
                        </div>
                        <div class="card-tools">
                            <form action="{{ route('module.index') }}" method="get">
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
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Nhóm bài học</th>
                                    <th>Khóa học</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modules as $module)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $module->id }}</td>
                                        <td>{{ $module->name }}</td>
                                        <td>{{ $module->course->name }}</td>
                                        <td>{{ $module->created_at }}</td>
                                        <td>
                                            <a class="" href="{{ route('module.edit', $module->id) }}">
                                                <button class="btn btn-warning">Sửa</button>
                                            </a>|@include('includes.delete', [
                                                'route' => 'module.destroy',
                                                'id' => $module->id,
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
