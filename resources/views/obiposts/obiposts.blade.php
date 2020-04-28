<ul class="list-unstyled">
    @foreach($obiposts as $obipost)
        <li class="card mb-3">
            <div class="row no-gutters">
                <div class="col-sm-4">
                    <img class="img-thumbnail float-left" src="{{ $obipost->obipost_image_path }}" width="100%" height="auto" alt="アップロードした画像">
                </div>
                <div class="col-sm-8">
                    <div class="card-body">
                        <h4 class="card-title">{!! link_to_route('obiposts.show', $obipost->title, ['id' => $obipost->id]) !!}</h4>
                        <p class="card-text">{{ $obipost->content }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-right">
                            <span class="badge  badge-pill badge-warning mr-2"><i class="fas fa-bookmark"></i> {{ $obipost->wishing_users()->count() }}</span>
                            <span class="badge  badge-pill badge-danger"><i class="fas fa-heart"></i> {{ $obipost->favorite_users()->count() }}</span>
                        </p>
                        <p class="text-muted text-right">
                            ＃ {!! link_to_route('obiposts.book_title', $obipost->book_title, ['book_title' => $obipost->book_title]) !!}  ＃ {!! link_to_route('obiposts.book_author', $obipost->book_author, ['book_author' => $obipost->book_author]) !!}
                        </p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
