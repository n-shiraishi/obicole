<ul class="list-unstyled">
    @foreach($obiposts as $obipost)
        <li class="card mb-3">
            <div class="row no-gutters">
                <div class="col-sm-4">
                    <img class="img-thumbnail float-left" src="#" alt="アップロードした画像">
                </div>
                <div class="col-sm-8">
                    <div class="card-body">
                        <h4 class="card-title">{!! link_to_route('obiposts.show', $obipost->title, ['id' => $obipost->id]) !!}</h4>
                        <p class="card-text">{{ $obipost->content }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-right">
                            <span class="badge  badge-pill badge-danger">♡ {{ $obipost->count_favorite_users }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
