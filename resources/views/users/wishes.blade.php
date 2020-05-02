@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <dev class="row">
            <div class="col-sm-4">
                @include('users.card',['user' => $user])
            </div>
            <div class="col-sm-8">
                @include('users.navtabs', ['user' => $user])
                @include('obiposts.obiposts', ['obiposts' => $obiposts])
            </div>
        </dev>
    </div>
@endsection