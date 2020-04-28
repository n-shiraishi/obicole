@if(Auth::id() != $obipost->user->id)
    @if(Auth::user()->is_wishing($obipost->id))
        {!! Form::open(['route' => ['wishes.unwished', $obipost->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fas fa-bookmark"></i>', ['class' => "btn btn-warning", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['wishes.wish', $obipost->id]]) !!}
            {!! Form::button('<i class="far fa-bookmark"></i>　気になる', ['class' => "btn btn-outline-warning", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif
@endif