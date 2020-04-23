@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if(count($obiposts) > 0)
                @include('obiposts.obiposts', ['obiposts' => $obiposts])
            @endif
        </div>
    </div>
@endsection