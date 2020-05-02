<ul class="nav nav-pills nav-justified mb-3">
    <li class="nav-item pill"><a href="{{ route('users.show',['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">投稿記事一覧 <span class="badge badge-secondary">{{ $count_obiposts }}</span></a></li>
    <li class="nav-item pill"><a href="{{ route('users.wishes', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/wishes') ? 'active' : '' }}">気になる一覧</a></li>
    <li class="nav-item pill"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">いいね一覧</a></li>
</ul>
