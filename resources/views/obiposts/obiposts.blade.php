<ul class="list-unstyled">
    @foreach($obiposts as $obipost)
        <li>
            <div class="card" style="max-width: 100%;">
                <div class="row no-gutters">
                    <div class="col-sm-4 obipost_image">
                            @if($obipost->obipost_image_path === NULL)
                                <p class="obicolelogo">Obicole</p>
                            @else
                                <img class="card-img" src="{{ $obipost->obipost_image_path }}" alt="アップロードした画像">
                            @endif
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h4 class="card-title">{!! link_to_route('obiposts.show', $obipost->title, ['id' => $obipost->id], ['class' => 'text-reset']) !!}</h4>
                            <p class="card-text text-right">
                                {!! link_to_route('obiposts.book_title', $obipost->book_title, ['book_title' => $obipost->book_title], ['class' => 'text-muted']) !!}  / {!! link_to_route('obiposts.book_author', $obipost->book_author, ['book_author' => $obipost->book_author], ['class' => 'text-muted']) !!}
                            </p>
                            <p class="card-text obipost_content mb-1">{{ $obipost->content }}</p>
                            <p class="card-text text-right">
                                <a href="{{ route('obiposts.wishing_users', ['id' => $obipost->id]) }}" class="badge  badge-pill badge-warning ml-auto mr-2"><i class="fas fa-bookmark"></i> {{ $obipost->wishing_users()->count() }}</a>
                                <a href="{{ route('obiposts.favorite_users', ['id' => $obipost->id]) }}" class="badge badge-pill badge-danger"><i class="fas fa-heart"></i> {{ $obipost->favorite_users()->count() }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </li>
    @endforeach
</ul>
<div class="d-flex justify-content-center mt-5">
    {{ $obiposts->links('pagination::bootstrap-4') }}
</div>