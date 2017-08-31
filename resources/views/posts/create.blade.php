@extends('main')
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>

@section('title', '| Create Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-offset-2">
            <h1 class="text-center">Tạo bài viết mới</h1>
            <hr>
            {{ Form::open(array('route' => 'posts.store', 'files' => true)) }}

            {{ Form::label('title', 'Tiêu đề') }}
            {{ Form::text('title', NULL, array('class' => 'form-control', 'required'=> '')) }}

            <br>

            {{ Form::label('body', 'Nội dung') }}
            {{ Form::textarea('body', NULL, array('class' => 'form-control', 'required'=> '', 'id' => 'summernote')) }}

            <br>

            {{ Form::label('file', 'File đính kèm') }}
            {{ Form::file('file', NULL, array('class' => 'form-control')) }}

            <br>

            {{ Form::label('category_id', 'Thể loại') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <br>
            {{ Form::submit('Lưu', array('class' => 'btn btn-success btn-block')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection

