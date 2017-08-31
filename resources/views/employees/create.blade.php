@extends('main')

@section('title', '| Create Employee')

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-offset-2">
            <h1 class="text-center">Tạo nhân viên mới</h1>
            <hr>
            {{ Form::open(array('route' => 'employees.store', 'files' => true)) }}

            {{ Form::label('name', 'Tên') }}
            {{ Form::text('name', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>

            {{ Form::label('role', 'Chức danh') }}
            {{ Form::text('role', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>

            {{ Form::label('department_id', 'Phòng/Ban') }}
            <select class="form-control" name="department_id">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>

            <br>

            {{ Form::label('avatar', 'Ảnh') }}
            {{ Form::file('avatar', NULL, array('class' => 'form-control')) }}

            <br>

            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <hr>

            {{ Form::label('phone', 'Điện thoại bàn') }}
            {{ Form::text('phone', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>

            {{ Form::label('mobile', 'Điện thoại di động') }}
            {{ Form::text('mobile', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>
            {{ Form::submit('Lưu', array('class' => 'btn btn-success btn-block')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection

