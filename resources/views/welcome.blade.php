@extends('layouts.app')
@section('title', 'Obicole')
@section('description', '本の帯を共有しよう。作品情報、感想、写真をアップロードする事で記事を共有できます。')

@section('content')
    <div class="col-sm-8">
        @if(count($obiposts) > 0)
            @include('obiposts.index')
        @endif
    </div>
    
@endsection