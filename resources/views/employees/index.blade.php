@extends('main')

@section('title', '| All Employees')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Tất cả nhân viên</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('employees.create') }}" class="btn btn-lg btn-block btn-success">Thêm mới</a>
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
                @foreach($employees as $employee)
                    <tr>
                        <th>{{ $employee->name }}</th>
                        <th>{{ $employee->role }}</th>
                        <th>{{ $employee->department->name }}</th>
                        <td><img src="{{ asset('images/avatar/' . $employee->avatar) }}" alt="{{ $employee->avatar }}" height="59" width="78"></td>
                        <th>{{ $employee->email }}</th>
                        <th>{{ $employee->phone }}</th>
                        <th>{{ $employee->mobile }}</th>
                        <td>
                            {!! Html::linkRoute('employees.edit', 'Sửa', array($employee->id), array('class' => 'btn btn-primary')) !!}

                        </td>
                        <td>
                            {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'DELETE']) !!}

                            {{ Form::submit('Xóa', ['class' => 'btn btn-danger']) }}

                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@endsection