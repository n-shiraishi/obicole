@extends('layouts.app')

@section('content')
    @include('commons.search_form')
    <h5><i class="fas fa-book-open"></i>  「{{ $book_title }}」についての記事</h5>
        @include('obiposts.obiposts')
@endsection