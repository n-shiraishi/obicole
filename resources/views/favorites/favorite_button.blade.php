@if(Auth::id() != $obipost->user->id)
    @if(Auth::user()->favorite_obiposts($obipost->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $obipost->id], 'method' => 'delete']) !!}
            {!! Form::submit('♡', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $obipost->id]]) !!}
            {!! Form::submit('いいね', ['class' => "btn btn-outline-danger"]) !!}
        {!! Form::close() !!}
    @endif
@endif