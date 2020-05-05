@extends('layouts.app')

@section('content')
    <div class="container mt-4 container-sm caption">
        <h5><i class="fas fa-user"></i> いいねしたユーザー</h5>
    @include('users.users')
        {!! link_to_route('obiposts.show', '記事詳細に戻る', ['id' => $obipost->id], ['class' => 'btn btn-secondary mt-3']) !!}
    </div>
@endsection