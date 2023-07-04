@extends('adminlte::page')

@section('title', 'Danh sách thông báo')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-6">
            <h1 class="ml-2">Danh sách thông báo</h1>
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
                        <a href="{{ route('slider.create') }}">
                            <button class="btn btn-success">Thêm mới</button>
                        </a>
                    </div>
                    <div class="card-tools">
                        <form action="{{ route('slider.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="name" value="" class="form-control float-right"
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
                    <table class="table table-light table-hover dataTable dtr-inline mt-4 text-nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $slider->id }}</td>
                                    <td><img src="{{ $slider->thumbnail }}" class="rounded img-fluid thumb" alt=""></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>
                                        <a class="mr-2" href="{{ route('slider.edit', $slider->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>@include('includes.delete', [
                                            'route' => 'slider.destroy',
                                            'id' => $slider->id,
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
        {{ $sliders->links() }}
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
