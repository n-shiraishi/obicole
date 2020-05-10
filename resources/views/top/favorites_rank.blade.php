@extends('layouts.app')
@section('title', 'いいねランキング | Obicole')
@section('description', 'いいねされた数の多い順に記事を表示するページです。')

@section('content')
    <div class="container mt-sm-4">
        @include('top.navtabs')
        @include('obiposts.obiposts')
    </div>
@endsection