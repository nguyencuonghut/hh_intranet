@extends('main')

@section('title', '| News')
@section('content')
    @include('partials._gallery')
    <div class="row">
        <div class="col-md-4">
            <ul class="nav nav-pills nav-stacked red">
                <li role="presentation" class="{{ Request::is('news') ? "active" : "" }}"><a href="{{ route('news.index') }}">TIN TỨC</a></li>
                <li role="presentation" class="{{ Request::is('announcements') ? "active" : "" }}"><a href="{{ route('announcements.index') }}">THÔNG BÁO</a></li>
                <li role="presentation" class="{{ Request::is('staffs') ? "active" : "" }}"><a href="{{ route('staffs.index') }}">NHÂN VIÊN</a></li>
                <li role="presentation" class="{{ Request::is('events') ? "active" : "" }}"><a href="{{ route('events.index') }}">SỰ KIỆN SẮP TỚI</a></li>
                <li role="presentation" class="{{ Request::is('relaxs') ? "active" : "" }}"><a href="{{ route('staffs.index') }}">GÓC THƯ GIÃN</a></li>
            </ul>
        </div>

        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="{{ route('announcements.single', $post->id) }}">
                            <img class="media-object" src="thongbao_medium.png">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('announcements.single', $post->id) }}">{{ $post->title }}</a></h4>
                        {{ mb_substr(strip_tags($post->body), 0, 250) }} {{ strlen(strip_tags($post->body)) > 250 ? '...':'' }}
                        <p><a href="{{ route('announcements.single', $post->id) }}" target="_blank">Xem thêm</a></p>
                    </div>
                </div>
            @endforeach

            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>

    </div>
@endsection