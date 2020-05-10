@extends('layouts.app')
@section('title', '検索結果一覧画面 | Obicole')
@section('description', '検索されたワードを含む記事の一覧を表示するページです。')

@section('content')
    <div class="container caption">
        @include('commons.search_form')
            <h5 class="mb-sm-4"><i class="fas fa-book"></i> "{{ $keyword }}"を含む記事</h5>
        @if(count($obiposts) > 0)
            @include('obiposts.obiposts')
        @else
            <p class="text-muted text-center">まだ投稿されていません</p>
        @endif
    </div>
@endsection