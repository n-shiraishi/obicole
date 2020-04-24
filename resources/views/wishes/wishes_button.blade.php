@if(Auth::id() != $obipost->user->id)
    @if(Auth::user()->is_wishing($obipost->id))
        {!! Form::open(['route' => ['wishes.unwished', $obipost->id], 'method' => 'delete']) !!}
            {!! Form::submit('☆', ['class' => "btn btn-warning"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['wishes.wish', $obipost->id]]) !!}
            {!! Form::submit('気になる', ['class' => "btn btn-outline-warning"]) !!}
        {!! Form::close() !!}
    @endif
@endif