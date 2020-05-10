@extends('layouts.app')
@section('title', 'パスワード更新画面 | Obicole')
@section('description', '新しいパスワードを設定して更新するページです。')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">パスワード更新</div>
                <div class="card-body text-center col-md-10 mx-auto">
                    {!! Form::open(['route' => 'password.request']) !!}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mt-4">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', $email or old('email'), ['class' => 'form-control', 'placeholder' => '例）obicole@gmail.com', 'required' => 'required']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <small class="error-message">{{ $errors->first('email') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('passwurd', '新しいパスワード') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '6文字以上', 'required' => 'required']) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <small class="error-message">{{ $errors->first('password') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation', '新しいパスワード（確認）') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control' ,'placeholder' => '確認のためもう一度入力してください', 'required' => 'required']) !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <small class="error-message">{{ $errors->first('password_confirmation') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::submit('パスワード更新', ['class' => 'btn btn-secondary mt-4 mb-4']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
