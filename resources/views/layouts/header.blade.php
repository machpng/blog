<header>
    <div class="container widewrapper masthead">
        <a href="/" id="logo">
            <img src="{{ asset('img/logo.png') }}" alt="clean Blog">
        </a>
        <div id="mobile-nav-toggle" class="pull-right">
            <a href="/" data-toggle="collapse" data-target=".clean-nav .navbar-collapse">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <nav class="pull-right clean-nav">
            <div class="collapse navbar-collapse">
                <ul class="nav nav-pills navbar-nav">
                    <li><a href="/">首页</a></li>
                    <li><a href="about.html">关于</a></li>
                    <li><a href="contact.html">联系</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">登录</a></li>
                        <li><a href="{{ route('register') }}">注册</a></li>
                    @else
                        <li><a href="{{ route('topics.store') }}">发布</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                登出
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>

    <div class="widewrapper subheader">
        <div class="container">
            <div class="clean-breadcrumb">
                <a href="/">Blog</a>
            </div>
            <div class="clean-searchbox">
                <form action="#" method="get" accept-charset="utf-8">
                    <input class="searchfield" id="searchbox" type="text" placeholder="Search">
                    <button class="searchbutton" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>