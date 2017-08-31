@extends('main')

@section('title', '| All Types')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Thể loại</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($types as $type)
                    <tr>
                        <th>{{ $type->id }}</th>
                        <th>{{ $type->name }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route'=> 'types.store', 'method' => 'POST']) !!}
                <h2 style="text-align: center">Tạo loại ảnh mới</h2>
                {{ Form::label('name', 'Tên:') }}
                {{ Form::text('name',null, ['class' => 'form-control']) }}

                <br>

                {{ Form::submit('Tạo loại mới', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        </div>
    </div>
@endsection