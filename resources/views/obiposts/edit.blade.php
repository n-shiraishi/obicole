@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-8 mb-5">
                {!! Form::model( $obipost, ['route' => ['obiposts.update', $obipost->id], 'method' => 'put', 'files' => true]) !!}
                
                    <div class="form-group">
                        {!! Form::text('title', null,  ['class' => 'form-control', 'placeholder' => '煽り文をPick Up']) !!}
                    </div>
                    <div class="form-group mb-4">
                        {!! Form::textarea('content', null,  ['class' => 'form-control', 'placeholder' => '感想など', 'rows' => '12']) !!}
                    </div>
                    <div>
                        {!! Form::label('obipost_image_path', '写真をアップロード') !!}
                        {!! Form::file('myfile', null) !!}
                    </div>
            </div>
            
            <div class="col-sm-4">
                    <div class="text-center border-bottom pb-2">
                        <h5>作品情報</h5>
                    </div>
                    <div class="form-group text-center mt-4">
                        {!! Form::label('book_title', '作品名') !!}
                        {!! Form::text('book_title', null, ['class' => 'form-control', 'placeholder' => '例）そして誰もいなくなった']) !!}
                    </div>
                    <div class="form-group text-center mt-4">
                        {!! Form::label('book_author', '著者名') !!}
                        {!! Form::text('book_author', null, ['class' => 'form-control', 'placeholder' => '例）アガサ・クリスティー']) !!}
                    </div>
            </div>
            
                {!! Form::submit('更新する', ['class' => 'btn btn-secondary mx-auto']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection