@extends('layouts.app')

@section('content')
    <div class="container mt-sm-4">
        @if($items === 0)
            <p class="text-muted text-center mt-5">関連する情報が見つかりませんでした。</p>
        @else
            @foreach ($items as $item)
                <div class="row mb-3">
                    <div class="col-sm-3 text-center align-items-center">
                        @if(isset($item->volumeInfo->imageLinks->thumbnail))
                            <img class="book_image" src="{{ $item->volumeInfo->imageLinks->thumbnail }}" width="85%" height="auto">
                        @else
                            <div class="image_box_2">
                                <p class="obicolelogo">No Image</p>
                            </div>
                        @endif
                        <div class="mt-sm-3 mb-sm-4 google_link">
                            @if(isset($item->volumeInfo->infoLink))
                            <a href="{{ $item->volumeInfo->infoLink }}" target="new" class="btn btn-light">Google Booksで見る</a>
                            @else
                            <p></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" class="book_table">書籍名</th>
                                    @if(isset($item->volumeInfo->title))
                                    <td>{{ $item->volumeInfo->title }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row" class="book_table">著者</th>
                                    @if(isset($item->volumeInfo->authors))
                                    <td>{{ implode(',', $item->volumeInfo->authors) }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row" class="book_table">発行日</th>
                                    @if(isset($item->volumeInfo->publishedDate))
                                    <td>{{ $item->volumeInfo->publishedDate }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row" class="book_table">出版社</th>
                                    @if(isset($item->volumeInfo->publisher))
                                    <td>{{ $item->volumeInfo->publisher }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row" class="book_table_caption">あらすじ</th>
                                    @if(isset($item->volumeInfo->description))
                                    <td>{{ $item->volumeInfo->description }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="d-flex justify-content-center">
            {!! link_to_route('obiposts.show', '記事詳細に戻る', ['id' => $obipost->id], ['class' => 'btn btn-secondary mt-3']) !!}
        </div>
    </div>
@endsection