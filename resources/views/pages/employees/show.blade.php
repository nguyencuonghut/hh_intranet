@extends('main')
@section('title', '| Show Post')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked red">
                <li role="presentation"><a href="{{ route('news.index') }}">TIN TỨC</a></li>
                <li role="presentation"><a href="{{ route('announcements.index') }}">THÔNG BÁO</a></li>
                <li role="presentation" class="active"><a href="{{ route('staffs.index') }}">NHÂN VIÊN</a></li>
                <li role="presentation"><a href="{{ route('events.index') }}">SỰ KIỆN SẮP TỚI</a></li>
                <li role="presentation"><a href="{{ route('relaxs.index') }}">GÓC THƯ GIÃN</a></li>
            </ul>
        </div>

        <div class="col-md-8">
            <h1 class="lead text-center" style="color:#AD0C18;">{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            @if(!empty($post->file))
                <img src="{{asset('/upload/files/' . $post->file)}}" width="745" height="1053" />
            @endif
            <br>
            <br>
            <p style="color:#337ab7"><i>Thể loại: {{ $post->category->name }}</i></p>

            <hr>
            <div class="col-md-12">
                <div class="panel panel-default panel-red">
                    <div class="panel-heading text-center panel-custom"><b>TIN KHÁC</b></div>
                    <div class="panel-body text-left">
                        @foreach($posts as $m_post)
                            @if($m_post->id != $post->id)
                            <div class="media">
                                <div class="media-left media-middle">
                                    <a href=" {{ route('staffs.single', $m_post->id) }}">
                                        <img class="media-object" src="{{ asset('images/' . $m_post->small_image) }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p></p><a href="{{ route('staffs.single', $m_post->id) }}">{{ mb_substr($m_post->title, 0, 150) }} {{ strlen($m_post->title) > 150 ? '...' : ''}}</a></p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection