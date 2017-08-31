@extends('main')

@section('title', '| All Deparments')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Phòng/Ban</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($departments as $department)
                    <tr>
                        <th>{{ $department->id }}</th>
                        <th>{{ $department->name }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route'=> 'departments.store', 'method' => 'POST']) !!}
                <h2 style="text-align: center">Tạo phòng/ban mới</h2>
                {{ Form::label('name', 'Tên:') }}
                {{ Form::text('name',null, ['class' => 'form-control']) }}

                <br>

                {{ Form::submit('Tạo phòng/ban mới', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        </div>
    </div>
@endsection