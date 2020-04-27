@extends('layouts.app')

@section('content')
    <h5><i class="fas fa-user"></i> 気になるしたユーザー</h5>
    @include('users.users')
    {!! link_to_route('obiposts.show', '記事詳細に戻る', ['id' => $obipost->id], ['class' => 'btn btn-info']) !!}
@endsection