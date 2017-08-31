@extends('main')

@section('title', '| Edit Image')

@section('content')
    <div class="row">
        {!! Form::model($picture, ['route' => ['pics.update',  $picture->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            <h1 class="text-center">Upload ảnh khác</h1>
            {!! Form::model($picture, ['route' => ['pics.update',  $picture->id], 'method' => 'PUT', 'files' => true]) !!}

            <br>

            {{ Form::label('type_id', 'Loại ảnh') }}
            <select class="form-control" name="type_id">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            {{ Form::label('pic', 'File đính kèm') }}

            {{ Form::file('pic', NULL, array('class' => 'form-control')) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Thời gian tạo:</dt>
                    <dd>{{ $picture->created_at }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Thời gian sửa:</dt>
                    <dd>{{ $picture->updated_at }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('pics.index', 'Hủy', array($picture->id), array('class' => 'btn btn-danger btn-block')) !!}
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