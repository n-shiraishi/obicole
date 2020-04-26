@extends('layouts.app')

@section('content')
    {!! Form::model( $user, ['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) !!}
        <div class="form-group text-center mt-4">
            {!! Form::label('name', 'ユーザー名') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group text-center mt-4">
            {!! Form::label('icon_image_path', 'プロフィール写真を選択') !!}
            {!! Form::file('myfile', null) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Upload') !!}
        </div>
    {!! Form::close() !!}
@endsection