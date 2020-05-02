<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Obicole</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item d-flex align-items-center mr-1">{!! link_to_route('top.favorites_rank', 'ランキング', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item d-flex align-items-center mr-1">{!! link_to_route('users.index', '全てのユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item d-flex align-items-center mr-1">{!! link_to_route('obiposts.create', '記事を投稿', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
                            @if(Auth::user()->icon_image_path === NULL)
                                <img class="icon_image" src="{{ url('images/iconmonstr-user-6-240 (1).png') }}">
                            @else
                                <img class="icon_image" src="{{ Auth::user()->icon_image_path }}">
                            @endif
                            　{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'マイページ', ['id' => Auth::id()], ['class' => 'text-reset']) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'text-reset']) !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', 'アカウント作成', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>