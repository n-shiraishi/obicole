@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">ログイン</div>
                    <div class="card-text text-center col-md-10 mx-auto">
                        {!! Form::open(['route' => 'login.post']) !!}
                            <div class="form-group mt-4">
                                {!! Form::label('email', 'メールアドレス') !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '例）obicole@gmail.com']) !!}
                            </div> 
                            <div class="form-group">
                                {!! Form::label('password', 'パスワード') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '6文字以上']) !!}
                                {!! link_to_route('password.request', 'パスワードを忘れた場合', [], ['class' => 'text-muted']) !!}
                            </div>
                            {!! Form::submit('ログイン', ['class' => 'btn btn-secondary mt-3 mb-4']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection