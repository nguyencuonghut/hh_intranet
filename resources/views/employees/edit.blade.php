@extends('main')

@section('title', '| Edit Employee')

@section('content')
    <div class="row">
        {!! Form::model($employee, ['route' => ['employees.update',  $employee->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {{ Form::label('name', 'Tên') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}

            <br>

            {{ Form::label('role', 'Chức vụ') }}
            {{ Form::text('role', null, ['class' => 'form-control']) }}

            <br>

            {{ Form::label('department_id', 'Phòng/Ban') }}
            <select class="form-control" name="department_id">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>

            <br>

            {{ Form::label('avatar', 'Ảnh') }}
            {{ Form::file('avatar', null, ['class' => 'form-control']) }}

            <br>
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', $employee->email, array('class' => 'form-control', 'required'=> '')) }}

            <br>
            {{ Form::label('phone', 'Điện thoại bàn') }}
            {{ Form::text('phone', $employee->phone, array('class' => 'form-control', 'required'=> '')) }}

            <br>
            {{ Form::label('mobile', 'Di động') }}
            {{ Form::text('mobile', $employee->mobile, array('class' => 'form-control', 'required'=> '')) }}

            <br>

        </div>

        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('employees.show', 'Hủy', array($employee->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection