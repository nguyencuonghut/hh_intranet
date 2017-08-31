@extends('main')

@section('title', '| Kỹ Thuật')

@section('content')
    <!-- Wrapper for slides -->
    <div class="container-fluid">
        <div class="row">
            {{ Html::image('Screensave1.jpg', '', array('class' => 'img-responsive')) }}
        </div>
    </div>

    <hr>

    <div class="row">

        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Danh bạ công ty</b></div>
                <div class="panel-body text-left">
                    <li role="presentation" class="{{ Request::is('organization') ? "active" : "" }}"><a href="{{ route('organization.company') }}">Công ty</a></li>
                    <li role="presentation" class="{{ Request::is('organization/hcns') ? "active" : "" }}"><a href="{{ route('organization.hcns') }}">Phòng Hành Chính Nhân Sự</a></li>
                    <li role="presentation" class="{{ Request::is('organization/ketoan') ? "active" : "" }}"><a href="{{ route('organization.ketoan') }}">Phòng Kế Toán</a></li>
                    <li role="presentation" class="{{ Request::is('organization/ksnb') ? "active" : "" }}"><a href="{{ route('organization.ksnb') }}">Phòng Kiểm Soát Nội Bộ</a></li>
                    <li role="presentation" class="{{ Request::is('organization/kinhdoanh') ? "active" : "" }}"><a href="{{ route('organization.kinhdoanh') }}">Phòng Kinh Doanh</a></li>
                    <li role="presentation" class="{{ Request::is('organization/sanxuat') ? "active" : "" }}"><a href="{{ route('organization.sanxuat') }}">Phòng Sản Xuất</a></li>
                    <li role="presentation" class="{{ Request::is('organization/baotri') ? "active" : "" }}"><a href="{{ route('organization.baotri') }}">Phòng Bảo Trì</a></li>
                    <li role="presentation" class="{{ Request::is('organization/thumua') ? "active" : "" }}"><a href="{{ route('organization.thumua') }}">Phòng Thu Mua</a></li>
                    <li role="presentation" class="{{ Request::is('organization/qlc') ? "active" : "" }}"><a href="{{ route('organization.qlcl') }}">Phòng Quản Lý Chất Lượng</a></li>
                    <li role="presentation" class="{{ Request::is('organization/kythuat') ? "active" : "" }}"><a href="{{ route('organization.kythuat') }}">Phòng Kỹ Thuật</a></li>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-center">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Phòng Kỹ Thuật</b></div>
                <div class="panel-body text-left">
                    {{ Html::image('organization1.jpg', 'company', array('class' => 'img-rounded center-block', 'width' => '600', 'height' => '400')) }}
                </div>
            </div>
        </div>
    </div>
@endsection
