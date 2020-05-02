@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <img class="image-1" src="{{ url('images/sincerely-media-iNyIdlLC0o8-unsplash.jpg') }}" width="100%" height="auto">
                    <div class="card-img-overlay">
                        <div class="card-title">ログイン</div>
                        <div class="card-text text-center col-md-10 mx-auto">
                            {!! Form::open(['route' => 'login.post']) !!}
                                <div class="form-group">
                                    {!! Form::label('email', 'メールアドレス') !!}
                                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                                </div> 
                                <div class="form-group">
                                    {!! Form::label('password', 'パスワード') !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('ログイン', ['class' => 'btn btn-secondary mt-3']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection