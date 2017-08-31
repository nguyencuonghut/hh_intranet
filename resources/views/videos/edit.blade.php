@extends('main')

@section('title', '| Edit Video')

@section('content')
    <div class="row">
        {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('name', 'Tên') }}
            {{ Form::text('name', $video->name, ['class' => 'form-control']) }}

            <br>

            {{ Form::label('link', 'Link') }}
            {{ Form::text('link', $video->link, ['class' => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('videos.index', 'Hủy', array($video->id), array('class' => 'btn btn-danger btn-block')) !!}
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