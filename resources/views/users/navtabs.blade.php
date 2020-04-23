<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show',['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">投稿記事一覧 <span class="badge badge-info">{{ $count_obiposts }}</span></a></li>
    <li class="nav-item"><a href="#" class="nav-link">気になる一覧</a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">いいね一覧</a></li>
</ul>
