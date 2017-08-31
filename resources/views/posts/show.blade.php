@extends('main')

@section('title', '| Show Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="lead">{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <p>File đính kèm: <u>{{ $post->file }}</u></p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <div class="dl-horizontal">
                    <label>Thời gian tạo:</label>
                    <p>{{ $post->created_at }}</p>
                </div>

                <div class="dl-horizontal">
                    <label>Thời gian sửa:</label>
                    <p>{{ $post->updated_at }}</p>
                </div>

                <div class="dl-horizontal">
                    <label>Thể loại:</label>
                    <p>{{ $post->category->name }}</p>
                </div>

                <div class="dl-horizontal">
                    <label>File đính kèm:</label>
                    <p>{{ $post->file }}</p>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Sửa', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                        {{ Form::submit('Xóa', ['class' => 'btn btn-danger btn-block']) }}

                        {!! Form::close() !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-12">
                        {{ HTML::linkRoute('posts.index', 'Xem tất cả các bài viết', [], array('class' => 'btn btn-default btn-block btn-hl-spacing')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection