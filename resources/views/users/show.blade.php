@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('users.card', ['user' => $user])
            </div>
            <div class="col-sm-9">
                @include('users.navtabs', ['user' => $user])
                @if(count($obiposts) > 0)
                    @include('obiposts.obiposts', ['obiposts' => $obiposts])
                @endif
            </div>
        </div>
    </div>
@endsection