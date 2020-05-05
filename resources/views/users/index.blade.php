@extends('layouts.app')

@section('content')
    <div class="container mt-4 container-sm caption">
        <h5 class="mb-0"><i class="fas fa-user"></i> ユーザー</h5>
        @include('users.users')
    </div>
@endsection