@extends('main')

@section('title', '| Show All Pictures')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Kiểu</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($pictures as $picture)
                    <tr>
                        <th>{{ $picture->type->name }}</th>
                        <td><img src="{{ asset('upload/galleries/' . $picture->name) }}" alt="{{ $picture->name }}" height="120" width="180"></td>
                        <td>{{ $picture->name}}</td>
                        <td>
                            {!! Html::linkRoute('pics.edit', 'Sửa', array($picture->id), array('class' => 'btn btn-primary')) !!}

                        </td>
                        <td>
                            {!! Form::open(['route' => ['pics.destroy', $picture->id], 'method' => 'DELETE']) !!}

                            {{ Form::submit('Xóa', ['class' => 'btn btn-danger']) }}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $pictures->links() !!}
            </div>
        </div>
    </div>
@endsection