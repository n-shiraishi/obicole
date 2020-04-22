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
                {!! link_to_route('obiposts.create', '記事を投稿する', [], ['class' => 'btn btn-block btn-primary']) !!}
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">投稿記事一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">気になる一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">いいね一覧</a></li>
            </ul>
            @if(count($obiposts) > 0)
                @include('obiposts.obiposts', ['obiposts' => $obiposts])
            @endif
            
            
        </div>
    </div>
@endsection