@extends('main')

@section('title', '| View All Videos')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Tất cả video</h1>
        </div>
        <div class="col-md-2">
            {{ Html::linkRoute('videos.create', 'Thêm mới video', null, array('class' => 'btn btn-lg btn-block btn-primary btn-hl-spacing')) }}
        </div>

        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Id</th>
                <th>Tên</th>
                <th>Link</th>
                </thead>

                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <th>{{ $video->id }}</th>
                        <th>{{ $video->name }}</th>
                        <th>{{ $video->link }}</th>
                        <th>
                            {{ Html::linkRoute('videos.edit', 'Sửa', array($video->id), array('class' => 'btn btn-primary')) }}
                        </th>
                        <th>
                            {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'DELETE']) !!}

                            {{ Form::submit('Xóa', ['class' => 'btn btn-danger']) }}

                            {!! Form::close() !!}
                        </th>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

@endsection