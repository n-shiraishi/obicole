@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">アカウント作成</div>
                    <div class="card-text text-center col-md-10 mx-auto">
                            {!! Form::open(['route' => 'signup.post']) !!}
                                <div class="form-group mt-4">
                                    {!! Form::label('name', 'ユーザ名') !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'メールアドレス') !!}
                                    {!! Form::email('email',old('email'), ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password', 'パスワード') !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('登録する', ['class' => 'btn btn-secondary mt-3 mb-4']) !!}
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection