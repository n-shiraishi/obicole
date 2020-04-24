@extends('layouts.app')

@section('content')
    <dev class="row">
        <aside class="col-sm-4">
            @include('users.card',['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @include('obiposts.obiposts', ['obiposts' => $obiposts])
        </div>
    </dev>
@endsection