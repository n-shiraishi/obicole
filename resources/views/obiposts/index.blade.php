@extends('layouts.app')

@section('content')
    <div class="container">
        @include('commons.search_form')
            <h5 class="pb-0 mb-4"><i class="fas fa-book"></i> すべての記事</h5>
        @include('obiposts.obiposts')
    </div>
@endsection
