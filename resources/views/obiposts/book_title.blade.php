@extends('layouts.app')
@section('title', '記事検索画面 | Obicole')
@section('description', '記事を検索するページです。投稿された記事に関連する作品について書かれた記事を検索できます。')

@section('content')
    <div class="container mt-sm-4 caption">
        @include('commons.search_form')
            <h5 class="mb-sm-4"><i class="fas fa-book-open"></i>  「{{ $book_title }}」についての記事</h5>
        @include('obiposts.obiposts')
    </div>
@endsection