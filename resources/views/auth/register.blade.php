@extends('layouts.app')

@section('content')
    <div class="col-sm-8 mx-auto">
        <div class="card mb-3">
            <div class="card-header">
                アカウント作成
            </div>
            
            <div class="card-body text-center">
                <div class="col-sm-9 offset-sm-3 mx-auto">
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
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        
                        {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection