@extends('adminlte::page')
@section('content_header')

    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="ml-2">{{ $title }}</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>

@stop
@section('content')

    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFullName">Họ và tên</label>
                            <input name="username" type="text" class="form-control" id="exampleInputFullName"
                                placeholder="Họ và tên" value="{{ $student->username }}">
                            @error('username')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tên đăng nhập</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName"
                                placeholder="Tên đăng nhập" value="{{ $student->name }}">
                            @error('name')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập email" value="{{ $student->email }}">
                            @error('email')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập số điện thoại" value="{{ $student->phone }}">
                            @error('phone')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Tỉnh</label>
                                    <select name="province_id" class="form-control" id="province">
                                        <option>--Chọn tỉnh--</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Huyện</label>
                                    <select name="district_id" class="form-control" id="district">
                                        
                                    </select>
                                    @error('district_id')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Xã</label>
                                    <select name="ward_id" class="form-control" id="ward">
                                    
                                    </select>
                                    @error('ward_id')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Nhập địa chỉ">{{ $student->address }}</textarea>
                            @error('address')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#province').change(function(e) {
                var province_id = $(this).val();

                if (province_id == "") {
                    var country_id = 0;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('/province/') }}/' + province_id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response['districts'].length > 0) {
                            $("#district").empty();
                            $.each(response['districts'], function(key, value) {
                                if (value['id'] == {{ $student->district_id }}) {
                                    $("#district").append("<option value='" + value[
                                            'id'] +
                                        "' selected>" + value['name'] + "</option>")
                                } else {
                                    $("#district").append("<option value='" + value[
                                            'id'] +
                                        "'>" + value['name'] + "</option>")
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#district').change(function(e) {
                var district_id = $(this).val();

                if (district_id == "") {
                    var country_id = 0;
                }

                $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('/district/') }}/' + district_id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response['wards'].length > 0) {
                            $("#ward").empty();
                            $.each(response['wards'], function(key, value) {
                                $("#ward").append("<option value='" + value['id'] +
                                    "' >" + value['name'] + "</option>")
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
