@extends('layouts.app')
@section('title', 'アカウント作成画面 | Obicole')
@section('description', 'ユーザーアカウント作成ページです。')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">アカウント作成</div>
                    <div class="card-text text-center col-md-10 mx-auto">
                            {!! Form::open(['route' => 'signup.post', 'name' => 'form1']) !!}
                                <div class="form-group mt-4 realTime">
                                    {!! Form::label('name', 'ユーザ名') !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control name' ,'placeholder' => '20文字以内']) !!}
                                    <span class="alertarea"></span>
                                </div>
                                <div class="form-group realTime">
                                    {!! Form::label('email', 'メールアドレス') !!}
                                    {!! Form::email('email',old('email'), ['class' => 'form-control mail' ,'placeholder' => '例）obicole@gmail.com']) !!}
                                    <span class="alertarea"></span>
                                </div>
                                <div class="form-group realTime">
                                    {!! Form::label('password', 'パスワード') !!}
                                    {!! Form::password('password', ['class' => 'form-control password' ,'placeholder' => '6文字以上']) !!}
                                    <span class="alertarea"></span>
                                </div>
                                <div class="form-group realTime">
                                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control confirmation' ,'placeholder' => '確認のためもう一度入力してください']) !!}
                                    <span class="alertarea"></span>
                                </div>
                                {!! Form::submit('登録する', ['class' => 'btn btn-secondary mt-3 mb-4']) !!}
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection