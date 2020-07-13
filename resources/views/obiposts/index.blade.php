@extends('layouts.app')
@section('title')
@section('description', 'オビコレ ー 本の帯を共有しよう。作品情報、感想、写真をアップロードする事で記事を共有できます。')

@section('content')
    <div class="container caption">
        @include('commons.search_form')
            <h5 class="pb-0 mb-sm-4"><i class="fas fa-book"></i> すべての記事</h5>
        @include('obiposts.obiposts')
    </div>
@endsection
