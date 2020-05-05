@extends('layouts.app')

@section('content')
    <div class="container mt-sm-4">
        @include('top.navtabs')
        @include('obiposts.obiposts')
    </div>
@endsection