@extends('layouts.app')
@section('title', 'ユーザー編集画面 | Obicole')
@section('description', 'ユーザーのプロフィールを編集するページです。')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <div class="card">
                    <div class="card-header">プロフィール編集</div>
                    <div class="card-text text-center col-md-8 mx-auto">
                        {!! Form::model( $user, ['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) !!}
                            <div class="form-group mt-3">
                                {!! Form::label('name', 'ユーザー名') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group mt-3">
                                {!! Form::label('icon_image_path', 'プロフィール画像') !!}
                                {!! Form::file('myfile', null) !!}
                            </div>
                            <div class="form-group mt-4">
                                {!! Form::submit('更新する', ['class' => 'btn btn-secondary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection