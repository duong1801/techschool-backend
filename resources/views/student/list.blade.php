@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6">
            <h1>Danh sách học viên</h1>
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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{ route('student.create') }}">
                        <button class="btn btn-success">Thêm mới học viên</button>
                    </a>
                </div>
                <div class="card-tools">
                    <form action="{{ route('student.index') }}" method="get">
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
                            <th scope="col">STT</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tên đăng nhập</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td><img height="50px" src="{{ asset('storage/avatars/'.$student->avatar) }}" alt="avatar-student"></td>
                                <td>{{ $student->username }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td class="d-flex">
                                    <a class="mr-2" href="{{ route('student.edit', $student->id) }}">
                                        <button class="btn btn-warning">Sửa</button>
                                    </a>
                                    @include('includes.delete', [
                                        'route' => 'student.destroy',
                                        'id' => $student->id,
                                    ])
                                    <a class="ml-2" href="{{ route('student.show', $student->id) }}">
                                        <button class="btn btn-primary">Chi tiết</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        {{ $students->links() }}
    </div>
@endsection
