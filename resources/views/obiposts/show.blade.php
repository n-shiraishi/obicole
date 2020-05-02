@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container mt-4">
            <h1 class="text-center">{{ $obipost->title }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="image_box">
                    @if($obipost->obipost_image_path === NULL)
                        <img class="content_image" src="../images/iconmonstr-book-3-240.png" alt="アップロードされた画像">
                    @else
                        <img class="content_image" src="{{ $obipost->obipost_image_path }}" alt="アップロードされた画像">
                    @endif
                </div>
                    <p class="mt-2 mr-2">
                        {!! link_to_route('obiposts.book_title', '#' . $obipost->book_title, ['book_title' => $obipost->book_title], ['class' => 'text-muted']) !!}　
                        {!! link_to_route('obiposts.book_author', '#' . $obipost->book_author, ['book_author' => $obipost->book_author], ['class' => 'text-muted']) !!}
                    </p>
            </div>
            <div class="col-sm-8">
                <div class="d-flex align-items-center">
                    <div class="d-inline-flex p-2">
                        @if($obipost->user->icon_image_path === NULL)
                            <img class="icon_image" src="{{ url('images/iconmonstr-user-6-240 (1).png') }}" alt="ユーザアイコン画像">
                        @else
                            <img class="icon_image" src="{{ $obipost->user->icon_image_path }}" alt="ユーザアイコン画像">
                        @endif
                    </div>
                    <div class="d-inline-flex p-2">
                        <h5 class="user_name">{!! link_to_route('users.show', $obipost->user->name, ['id' => $obipost->user->id]) !!}</h5>
                    </div>
                    <div class="d-inline-flex ml-auto mr-3 p-2">
                        <p class="text-right mb-0">| {{ $obipost->created_at }}</p>
                    </div>
                </div>
                <div class="mr-3">
                    <p class="text-right">
                        <span class="badge badge-pill badge-warning mr-2"><i class="fas fa-bookmark"></i> {!! link_to_route('obiposts.wishing_users', $count_wishing_users, ['id' => $obipost->id], ['class' => 'text-reset text-decoration-none']) !!}</span>
                        <span class="badge badge-pill badge-danger"><i class="fas fa-heart"></i> {!! link_to_route('obiposts.favorite_users', $count_favorite_users, ['id' => $obipost->id], ['class' => 'text-reset text-decoration-none']) !!}</span>
                    </p>
                </div>
                
                <div class="content border-bottom pb-2 mb-1">
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
                        <div class="d-inline-flex ml-auto p-2">{!! link_to_route('obiposts.edit', '記事を編集する', ['id' => $obipost->id], ['class' => 'btn btn-outline-success mr-1']) !!}</div>
                        {!! Form::model($obipost, ['route' => ['obiposts.destroy', $obipost->id], 'method' => 'delete']) !!}
                        <div class="d-inline-flex p-2">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                               記事を削除する
                            </button>
                        </div>
                            <!-- モーダルの設定 -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">記事の削除</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>この記事を削除しますか？</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">閉じる</button>
                                    {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                                  </div>
                                </div>
                              </div>
                            </div>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection