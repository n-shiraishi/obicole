<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('top.favorites_rank') }}" class="nav-link {{ Request::is('favorites_rank') ? 'active' : '' }}">いいねランキング</a></li>
    <li class="nav-item"><a href="{{ route('top.swishes_rank') }}" class="nav-link {{ Request::is('wishes_rank') ? 'active' : '' }}">気になるランキング</a></li>
</ul>