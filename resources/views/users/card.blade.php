<div class="card">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <div class="card-body">
        <img class="rounded img-fluid" src="{{ $user->icon_image_path }}" alt="ユーザアイコン画像">
    </div>
</div>
    @if(Auth::id() == $user->id)
        {!! link_to_route('users.edit', 'プロフィール画像を変更する', ['id' => $user->id], ['class' => 'btn btn-success mt-4']) !!}
        {!! link_to_route('obiposts.create', '記事を投稿する', [], ['class' => 'btn btn-block btn-primary mt-4']) !!}
    @endif