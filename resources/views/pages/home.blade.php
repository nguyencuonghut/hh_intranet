@extends('main')

@section('title', '| Homepage')

@section('content')
    @include('partials._gallery')
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron">
                <h2>{{ $jumbotrons->first()->title }}</h2>
                <p class="lead">{{ substr(strip_tags($jumbotrons->first()->body), 0, 250) }}{{strlen(strip_tags($jumbotrons->first()->body)) > 250 ? '...':''}}</p>
                <p><a class="btn btn-primary btn-lg btn-success" href="{{ 2 == $jumbotrons->first()->category_id ? route('file.single', $jumbotrons->first()->file) : route('news.single', $jumbotrons->first()->id)}}" role="button">Xem thêm</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default panel-red">
                <div class="panel-heading text-center"><b>TIN MỚI</b></div>
                <div class="panel-body text-left">
                    @foreach($posts as $post)
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href=" {{ route('news.single', $post->id) }}">
                                    <img class="media-object" src="{{ asset('images/' . $post->small_image) }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <p><a href="{{ route('news.single', $post->id) }}">{{ mb_substr($post->title, 0, 70) }} {{ strlen($post->title) > 70 ? '...' : '' }}</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default panel-red">
                <div class="panel-heading text-center"><b>THÔNG BÁO</b></div>
                @foreach($announcements->take(2) as $announcement)
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a target="_blank" href="{{ route('file.single', $announcement->file) }}">
                                    <img class="media-object" src="thongbao_small.png">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a target="_blank" href="{{ route('file.single', $announcement->file) }}">{{ $announcement->title }}</a></h4>
                                <p>{{ mb_substr(strip_tags($announcement->body), 0, 250) }} {{ strlen(strip_tags($announcement->body)) > 250 ? '...':'' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default panel-red">
                <div class="panel-heading text-center"><b>NHÂN VIÊN</b></div>
                @foreach($employees->take(2) as $employee)
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="{{ route('staffs.single', $employee->id) }}">
                                    <img class="media-object" src="{{ asset('images/' . $employee->small_image) }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href=" {{ route('staffs.single', $employee->id) }}">{{ mb_substr(strip_tags($employee->title), 0, 48) }} {{ strlen(strip_tags($employee->title)) > 48 ? '...':'' }}</a></h4>
                                <p>{{ mb_substr(strip_tags($employee->body), 0, 250) }} {{ strlen(strip_tags($employee->body)) > 250 ? '...':'' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr>
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default panel-red">
                <div class="panel-heading text-center"><b>SỰ KIỆN SẮP TỚI</b></div>
                @foreach($events->take(2) as $event)
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="{{ route('events.single', $event->id) }}">
                                    <img class="media-object" src="{{ asset('images/' . $event->small_image) }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href=" {{ route('events.single', $event->id) }}">{{ mb_substr(strip_tags($event->title), 0, 48) }} {{ strlen(strip_tags($event->title)) > 48 ? '...':'' }}</a></h4>
                                <p>{{ mb_substr(strip_tags($event->body), 0, 200) }} {{ strlen(strip_tags($event->body)) > 200 ? '...':'' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default panel-red">
                <div class="panel-heading text-center"><b>GÓC THƯ GIÃN</b></div>
                @foreach($relaxs->take(2) as $relax)
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a target="_blank" href="{{ route('relaxs.single', $relax->file) }}">
                                    <img class="media-object" src="{{ 'images/' . $relax->small_image }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a target="_blank" href="{{ route('relaxs.single', $relax->file) }}">{{ $relax->title }}</a></h4>
                                <p>{{ mb_substr(strip_tags($relax->body), 0, 250) }} {{ strlen(strip_tags($relax->body)) > 250 ? '...':'' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default panel-red">
                <div class="panel-heading text-center"><b>THƯ VIỆN ẢNH</b></div>
                <div class="panel-body">
                    <div id="carousel-example-generic-1" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $i = 0; ?>
                            @foreach($pictures as $picture)
                                <div class="item @if($i ==0) active @endif">
                                    <img src="{{ 'upload/galleries/' . $picture->name }}" alt="{{ $picture->name }}">
                                </div>
                                <?php $i = $i + 1; ?>
                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic-1" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic-1" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default panel-modify panel-red">
                <div class="panel-heading text-center"><b>VIDEO CLIP</b></div>
                <div class="panel-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $video->link }}"></iframe>
                    </div>
                    <p><a class="btn btn-primary btn-md btn-h1-spacing btn-success" href="https://www.youtube.com/watch?v=bKVty1wMzUo&list=UU8RD3414rroqnXtIEpC-2eQ" role="button" target="_blank">Xem thêm video khác</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection