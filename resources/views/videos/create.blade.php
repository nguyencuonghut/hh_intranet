@extends('main')

@section('title', '| Create New Video')

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-offset-2">
            <h1 class="text-center">Tạo video mới</h1>
            <hr>
            {{ Form::open(array('route' => 'videos.store', 'files' => true)) }}

            {{ Form::label('name', 'Tên') }}
            {{ Form::text('name', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>

            {{ Form::label('link', 'Đường dẫn') }}
            {{ Form::text('link', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>
            {{ Form::submit('Lưu', array('class' => 'btn btn-success btn-block')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection