@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{ Html::image('Screensave-03.jpg', '', array('class' => 'img-responsive')) }}
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Danh bạ công ty</b></div>
                <div class="panel-body text-left">
                    <li role="presentation" class="{{ Request::is('/contact') ? "active" : "" }}"><a href="/contact">Phòng Hành Chính Nhân Sự</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/ketoan') ? "active" : "" }}"><a href="/contact/ketoan">Phòng Kế Toán</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/ksnb') ? "active" : "" }}"><a href="/contact/ksnb">Phòng Kiểm Soát Nội Bộ</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/kinhdoanh') ? "active" : "" }}"><a href="/contact/kinhdoanh">Phòng Kinh Doanh</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/sanxuat') ? "active" : "" }}"><a href="/contact/sanxuat">Phòng Sản Xuất</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/baotri') ? "active" : "" }}"><a href="/contact/baotri">Phòng Bảo Trì</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/thumua') ? "active" : "" }}"><a href="/contact/thumua">Phòng Thu Mua</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/qlcl') ? "active" : "" }}"><a href="/contact/qlcl">Phòng Quản Lý Chất Lượng</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/kythuat') ? "active" : "" }}"><a href="/contact/kythuat">Danh bạ phòng Kỹ Thuật</a></li>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-center">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Phòng Hành Chính Nhân Sự</b></div>
                <div class="panel-body text-left">
                    @foreach($employees as $employee)
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="{{ '/images/avatar/' . $employee->avatar }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><b>{{ $employee->name . ' - ' . $employee->role }}</b></h5>
                                Email:<a href="#">{{ $employee->email }}</a><br>
                                Mobile: {{ $employee->mobile }}<br>
                                Phone: {{ $employee->phone }}<br>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection