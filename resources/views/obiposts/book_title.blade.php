@extends('layouts.app')

@section('content')
    <div class="container mt-sm-4 caption">
        @include('commons.search_form')
            <h5 class="mb-sm-4"><i class="fas fa-book-open"></i>  「{{ $book_title }}」についての記事</h5>
        @include('obiposts.obiposts')
    </div>
@endsection