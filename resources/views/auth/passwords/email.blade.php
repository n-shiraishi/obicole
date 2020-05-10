@extends('layouts.app')
@section('title', 'メール送信画面 | Obicole')
@section('description', 'パスワード再設定のためのメール送信ページです。')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">パスワードリセット</div>
                    <div class="card-body text-center col-md-10 mx-auto">
                    {!! Form::open(['route' => 'password.email']) !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '例）obicole@gmail.com', 'required' => 'required']) !!}
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <small class="error-message">{{ $errors->first('email') }}</email>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::submit('メール送信', ['class' => 'btn btn-secondary mt-4 mb-4']) !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
