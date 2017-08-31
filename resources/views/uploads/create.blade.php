@extends('main')
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>

@section('title', '| Upload Image')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center">Upload ảnh</h1>
            {{ Form::open(array('route' => 'pics.store', 'files' => true)) }}

            {{ Form::label('pics', 'File đính kèm') }}

            <br>

            {{ Form::label('type_id', 'Loại ảnh') }}
            <select class="form-control" name="type_id">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <br>
            <input name="pics[]" type="file" multiple="" />
            <br>
            {{ Form::submit('Lưu', array('class' => 'btn btn-success btn-block')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection

