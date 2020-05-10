@extends('layouts.app')
@section('title', 'ユーザー表示画面 | Obicole')
@section('description', '全ユーザーの一覧を表示するページです。')
@section('content')
    <div class="container mt-4 container-sm caption">
        <h5 class="mb-0"><i class="fas fa-user"></i> ユーザー</h5>
        @include('users.users')
    </div>
@endsection