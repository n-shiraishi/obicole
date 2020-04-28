@extends('layouts.app')

@section('content')
@include('commons.search_form')

    <h5><i class="fas fa-book"></i> すべての記事</h5>

@include('obiposts.obiposts')

@endsection
