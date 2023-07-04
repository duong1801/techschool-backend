@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6">
            <h1>Chi tiết học viên</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item">học viên</li>
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
            <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Thông tin chi tiết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                            href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                            aria-selected="false">Khóa học đã mua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                            href="#custom-content-below-messages" role="tab"
                            aria-controls="custom-content-below-messages" aria-selected="false">Lịch sử học tập</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane p-4 fade active show" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <div class="col-md-12">
                            <div class="col-md-6 mx-auto">
                                <img src="{{ $student->avatar }}" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-md-6 mx-auto">
                                <p>Họ và tên: {{ $student->name }}</p>
                                <p>Email: {{ $student->email }}</p>
                                <p>Số điện thoại: {{ $student->phone }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-4 fade" id="custom-content-below-profile" role="tabpanel"
                        aria-labelledby="custom-content-below-profile-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ $student->avatar }}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Họ và tên: {{ $student->name }}</p>
                                    <p>Email: {{ $student->email }}</p>
                                    <p>Số điện thoại: {{ $student->phone }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên khóa học</th>
                                                    <th scope="col">giá tiền</th>
                                                    <th scope="col">Ngày mua</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($student->courses  as $key => $course)
                                                <tr>
                                                    <td scope="row">{{ $key + 1 }}</td>
                                                    <td scope="row">{{  $course->name }}</td>
                                                    <td scope="row">{{  $course->price }}</td>
                                                    <td scope="row">{{  $course->pivot->created_at }}</td>
                                                </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel"
                        aria-labelledby="custom-content-below-messages-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
