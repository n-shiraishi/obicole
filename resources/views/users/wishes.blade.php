@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <dev class="row">
            <div class="col-sm-3">
                @include('users.card',['user' => $user])
            </div>
            <div class="col-sm-9">
                @include('users.navtabs', ['user' => $user])
                @include('obiposts.obiposts', ['obiposts' => $obiposts])
            </div>
        </dev>
    </div>
@endsection