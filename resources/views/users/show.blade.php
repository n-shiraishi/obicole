@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    {{ $user->name }}
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="#" alt="ユーザアイコン画像">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">投稿記事一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">気になる一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">いいね一覧</a></li>
            </ul>
        </div>
    </div>
@endsection