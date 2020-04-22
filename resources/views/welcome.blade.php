@extends('layouts.app')

@section('content')
    <div class="col-sm-8">
        @if(count($obiposts) > 0)
            @include('obiposts.index')
        @endif
    </div>
    
@endsection