@extends('layouts.app')
@section('title', 'ユーザー表示画面 | Obicole')
@section('description', '投稿された記事に対していいねしたユーザーを確認できます。')

@section('content')
    <div class="container mt-4 container-sm caption">
        <h5><i class="fas fa-user"></i> いいねしたユーザー</h5>
    @include('users.users')
        {!! link_to_route('obiposts.show', '記事詳細へ', ['id' => $obipost->id], ['class' => 'btn btn-secondary mt-3']) !!}
    </div>
@endsection