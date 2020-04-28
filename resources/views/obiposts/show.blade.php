@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
            <h1 class="text-center">{{ $obipost->title }}</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <img class="mx-auto d-block" src="{{ $obipost->obipost_image_path }}" width="100%" height="auto" alt="アップロードされた画像">
            <div class="d-inline-flex">
                <p class="text-break text-muted">
                    {!! link_to_route('obiposts.book_title', '#' . $obipost->book_title, ['book_title' => $obipost->book_title]) !!}
                </p>
                <p class="text-break text-muted">
                    {!! link_to_route('obiposts.book_author', '#' . $obipost->book_author, ['book_author' => $obipost->book_author]) !!}
                </p>
            </div>
        </div>
        
        <div class="col-sm-8">
            <div class="d-flex">
                <div class="d-inline-flex p-2">
                    <img class="icon_image" src="{{ $obipost->user->icon_image_path }}">
                </div>
                <div class="d-inline-flex p-2">
                    <h5>{!! link_to_route('users.show', $obipost->user->name, ['id' => $obipost->user->id]) !!}</h5>
                </div>
                <div class="d-inline-flex ml-auto mr-3">
                    <p class="text-right">| {{ $obipost->created_at }}</p>
                </div>
            </div>
            <div class="mr-3">
                <p class="text-right">
                    <span class="badge badge-pill badge-warning mr-2"><i class="fas fa-bookmark"></i> {!! link_to_route('obiposts.wishing_users', $count_wishing_users, ['id' => $obipost->id]) !!}</span>
                    <span class="badge badge-pill badge-danger"><i class="fas fa-heart"></i> {!! link_to_route('obiposts.favorite_users', $count_favorite_users, ['id' => $obipost->id]) !!}</span>
                </p>
            </div>
            
            <div class="border-bottom pb-2">
                <p class="text-break">{{ $obipost->content }}</p>
            </div>
            
            <div class="d-flex">
                <div class="d-inline-flex p-2">
                    @include('wishes.wishes_button')
                </div>
                <div class="d-inline-flex p-2">
                    @include('favorites.favorite_button')
                </div>
                @if(Auth::id() === $obipost->user->id) 
                    <div class="d-inline-flex ml-auto p-2">{!! link_to_route('obiposts.edit', '記事を編集する', ['id' => $obipost->id], ['class' => 'btn btn-success mr-1']) !!}</div>
                    {!! Form::model($obipost, ['route' => ['obiposts.destroy', $obipost->id], 'method' => 'delete']) !!}
                    <div class="d-inline-flex p-2">{!! Form::submit('記事を削除する', ['class' => 'btn btn-secondary mr-3']) !!}</div>
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endsection