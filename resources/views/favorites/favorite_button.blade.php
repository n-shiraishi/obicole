@if(Auth::id() != $obipost->user->id)
    @if(Auth::user()->favorite_obiposts($obipost->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $obipost->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-danger", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $obipost->id]]) !!}
            {!! Form::button('<i class="far fa-heart"></i>　いいね', ['class' => "btn btn-outline-danger", 'type' => 'badge']) !!}
        {!! Form::close() !!}
    @endif
@endif