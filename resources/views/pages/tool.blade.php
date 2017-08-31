@extends('main')

@section('title', '| Tools')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <img src="Screensave-03.jpg" class="img-responsive">
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Biểu mẫu công ty</b></div>
                <div class="panel-body">
                    <p><a href="http://example.com/files/myfile.pdf" target="_blank">1. Biểu mẫu 06 - Lần 7</a></p>
                    <p><a href="http://example.com/files/myfile.pdf" target="_blank">2. Mẫu đơn xin phép</a></p>
                    <p><a href="http://example.com/files/myfile.pdf" target="_blank">3. Mẫu đơn nghỉ việc</a></p>
                    <p><a href="http://example.com/files/myfile.pdf" target="_blank">4. Mẫu slide chuẩn</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Đường link hữu ích</b></div>
                <div class="panel-body">
                    <p><a href="#" target="_blank">1. Server dữ liệu: <u>172.16.2.30</u></a></p>
                    <p><a href="//172.16.2.40:4567" target="_blank">2. Forum công ty: <u>172.16.2.40:4567</u></a></p>
                    <p><a href="#" target="_blank">3. Bộ cài phần mềm: <u>172.16.2.30\Setup\01 Setup</u></a></p>
                    <p><a href="http://honghafeed.com.vn" target="_blank">4. Trang chủ công ty: <u>http://honghafeed.com.vn</u></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection