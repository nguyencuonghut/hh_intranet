@extends('main')

@section('title', '| Employee')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Nhân viên</h1>
        </div>

        <div class="col-md-2">
            <div class="well">
                <a href="{{ route('employees.create') }}" class="btn btn-md btn-block btn-success">Thêm mới</a>
                <a href="{{ route('employees.index') }}" class="btn btn-md btn-block btn-default">Xem tất cả</a>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Tên</th>
                <th>Chức vụ</th>
                <th>Phòng/Ban</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th>Số điện thoại bàn</th>
                <th>Số di động</th>
                </thead>

                <tbody>
                <tr>
                    <th>{{ $employee->name }}</th>
                    <th>{{ $employee->role }}</th>
                    <th>{{ $employee->department->name }}</th>
                    <td><img src="{{ asset('images/avatar/' . $employee->avatar) }}" alt="{{ $employee->avatar }}" height="59" width="78"></td>
                    <th>{{ $employee->email }}</th>
                    <th>{{ $employee->phone }}</th>
                    <th>{{ $employee->mobile }}</th>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection