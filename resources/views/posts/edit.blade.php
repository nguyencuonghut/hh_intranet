@extends('main')

@section('title', '| Edit Post')

@section('content')
    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update',  $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">

            {{ Form::label('category_id', 'Thể loại') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            {{ Form::label('title', 'Tiêu đề:') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            <br>
            {{ Form::label('body', 'Nội dung:') }}
            {{ Form::textarea('body', NULL, array('class' => 'form-control', 'required'=> '', 'id' => 'summernote')) }}

            <br>

            {{ Form::label('file', 'File đính kèm') }}
            {{ Form::file('file', NULL, array('class' => 'form-control')) }}

            <br>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Thời gian tạo:</dt>
                    <dd>{{ $post->created_at }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Thời gian sửa:</dt>
                    <dd>{{ $post->updated_at }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Thể loại:</dt>
                    <dd>{{ $post->category->name }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>File đính kèm:</dt>
                    <dd>{{ $post->file }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Hủy', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
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