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
                    <li role="presentation" class="{{ Request::is('/contact/ketoan') ? "active" : "" }}"><a href="/contact/ketoan/ketoan">Phòng Kế Toán</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/ksnb') ? "active" : "" }}"><a href="/contact/ksnb">Phòng Kiểm Soát Nội Bộ</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/kinhdoanh') ? "active" : "" }}"><a href="/contact/kinhdoanh">Phòng Kinh Doanh</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/sanxuat') ? "active" : "" }}"><a href="/contact/sanxuat">Phòng Sản Xuất</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/baotri') ? "active" : "" }}"><a href="/contact/baotri">Phòng Bảo Trì</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/thumua') ? "active" : "" }}"><a href="/contact/thumua">Phòng Thu Mua</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/qlcl') ? "active" : "" }}"><a href="/contact/qlcl">Phòng Quản Lý Chất Lượng</a></li>
                    <li role="presentation" class="{{ Request::is('/contact/kythuat') ? "active" : "" }}"><a href="/contact/kythuat">Phòng Kỹ Thuật</a></li>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-center">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Phòng Thu Mua</b></div>
                <div class="panel-body text-left">
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="contact.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><b>Nguyễn Thị Hằng - Giám đốc nhân sự tập đoàn</b></h5>
                            Email:<a href="#">nguyenthihang@honghafeed.com.vn</a><br>
                            Mobile: 0974 936 497<br>
                            Phone: 10<br>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="contact1.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><b>Phạm Thị Thu Hương</b></h5>
                            Email:<a href="#">phamthithuhuong@honghafeed.com.vn</a><br>
                            Mobile: 0974 936 497<br>
                            Phone: 11<br>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="contact2.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><b>Phạm Thị Thơm</b></h5>
                            Email:<a href="#">phamthithom@honghafeed.com.vn</a><br>
                            Mobile: 0974 936 497<br>
                            Phone: 12<br>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="contact3.jpg">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><b>Nguyễn Văn Cường - IT</b></h5>
                            Email:<a href="#">nguyenvancuong@honghafeed.com.vn</a><br>
                            Mobile: 0974 936 497<br>
                            Phone: 13<br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection