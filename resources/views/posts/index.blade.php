@extends('main')

@section('title', '| All Posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Tất cả tin tức</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-hl-spacing">Thêm bài mới</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Thể loại</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Thời gian tạo</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->category->name }}</th>
                        <td>{{ mb_substr ($post->title, 0, 50) }} {{ strlen($post->title) > 50 ? "...":"" }}</td>
                        <td>{{ mb_substr (strip_tags($post->body), 0, 50) }} {{ strip_tags(strlen($post->body)) > 50 ? "...":"" }}</td>
                        <td>{{ $post->created_at}}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm">Xem</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Sửa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection