@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <img class="image-1" src="../images/michel-rocha-GSIzNfR9GLE-unsplash.jpg" width="100%" height="auto">
                    <div class="card-img-overlay">
                        <div class="card-title">アカウント作成</div>
                        <div class="card-text text-center col-md-10 mx-auto">
                                {!! Form::open(['route' => 'signup.post']) !!}
                                    <div class="form-group">
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
                                    {!! Form::submit('登録する', ['class' => 'btn btn-secondary mt-4']) !!}
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection