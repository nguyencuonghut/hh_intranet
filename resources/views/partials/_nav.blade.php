<!-- Default Boostrap navigation bar -->
<nav class="navbar navbar-default navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/">{{ Html::image('logo_1.png', 'logo', array('style' => 'padding-bottom: 10px')) }}</a>
        </div>

        <ul class="nav nav-pills navbar-right">
            <li role="presentation" class="{{ Request::is('/') ? "active" : "" }}"><a href="/"><b>TRANG CHỦ</b></a></li>
            <li role="presentation" class="{{ Request::is('news') ? "active" : "" }}"><a href="/news"><b>TIN TỨC</b></a></li>
            <li role="presentation" class="{{ Request::is('organization') ? "active" : "" }}"><a href="/organization"><b>SƠ ĐỒ TỔ CHỨC</b></a></li>
            <li role="presentation" class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact"><b>DANH BẠ</b></a></li>
            <li role="presentation" class="{{ Request::is('tool') ? "active" : "" }}"><a href="/tool"><b>CÔNG CỤ VÀ TIỆN ÍCH</b></a></li>

            <form class="navbar-form navbar-left navbar-left-custom">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Tìm kiếm</button>
            </form>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi Admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>

        </ul>
    </div><!-- /.container-fluid -->
</nav>