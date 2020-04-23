<div class="card">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <div class="card-body">
        <img class="rounded img-fluid" src="#" alt="ユーザアイコン画像">
    </div>
    @if(Auth::id() == $user->id)
        {!! link_to_route('obiposts.create', '記事を投稿する', [], ['class' => 'btn btn-block btn-primary']) !!}
    @endif
</div>