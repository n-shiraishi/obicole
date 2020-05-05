@extends('layouts.app')

@section('content')
    <div class="container caption">
        @include('commons.search_form')
            <h5 class="pb-0 mb-sm-4"><i class="fas fa-book"></i> すべての記事</h5>
        @include('obiposts.obiposts')
    </div>
@endsection
