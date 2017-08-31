@extends('main')
@section('title', '| Show Relax')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked red">
                <li role="presentation"><a href="{{ route('news.index') }}">TIN TỨC</a></li>
                <li role="presentation"><a href="{{ route('announcements.index') }}">THÔNG BÁO</a></li>
                <li role="presentation"><a href="{{ route('staffs.index') }}">NHÂN VIÊN</a></li>
                <li role="presentation"><a href="{{ route('events.index') }}">SỰ KIỆN SẮP TỚI</a></li>
                <li role="presentation" class="active"><a href="{{ route('relaxs.index') }}">GÓC THƯ GIÃN</a></li>
            </ul>
        </div>
        <div class="col-md-8">
            <h1 class="lead text-center" style="color:#AD0C18;">{{ $relax->title }}</h1>
            <p>{!! $relax->body !!}</p>
            @if(!empty($relax->file))
                <img src="{{asset('/upload/files/' . $relax->file)}}" width="745" height="1053" />
            @endif
            <br>
            <br>
            <p style="color:#337ab7"><i>Thể loại: {{ $relax->category->name }}</i></p>

            <hr>
            <div class="col-md-12">
                <div class="panel panel-default panel-red">
                    <div class="panel-heading text-center panel-custom"><b>TRUYỆN CƯỜI KHÁC</b></div>
                    <div class="panel-body text-left">
                        @foreach($relaxs as $m_relax)
                            @if($m_relax->id != $relax->id)
                            <div class="media">
                                <div class="media-left media-middle">
                                    <a href=" {{ route('relaxs.single', $m_relax->id) }}">
                                        <img class="media-object" src="{{ asset('images/' . $m_relax->small_image) }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p></p><a href="{{ route('relaxs.single', $m_relax->id) }}">{{ mb_substr($m_relax->title, 0, 150) }} {{ strlen($m_relax->title) > 150 ? '...' : ''}}</a></p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="text-center">
                    {!! $relaxs->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection