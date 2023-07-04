@extends('adminlte::page')

@section('title', 'Danh sách comment')

@section('content_header')
    <div class="row my-2">
        <div class="col-md-6">
            <h1 class="ml-2">Danh sách comment</h1>
        </div>
        <div class="col-md-6 ">
        </div>
    @stop

    @section('content')
        <div class="row">
            <div class="col-md-12">
                @include('includes.flashMessage')
                <div class="table-responsive p-0">
                    <table class="table table-light table-hover dataTable dtr-inline mt-4 text-nowrap">
                        <thead>
                            <tr>
                                <th>Học viên</th>
                                <th>Nội dung</th>
                                <th>Bài giảng</th>
                                <th>Ngày tạo</th>

                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">
                                        {{ $comment->user->name }}
                                    </td>
                                    <td>{{ $comment->content }}</td>
                                    <td>
                                        {{ $comment->lesson->name }}
                                    </td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary">Trả lời</button>
                                        <button class="btn btn-warning">Khóa</button>
                                        @include('includes.delete', [
                                            'route' => 'comment.destroy',
                                            'id' => $comment->id,
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @stop

    @section('js')

    @stop
