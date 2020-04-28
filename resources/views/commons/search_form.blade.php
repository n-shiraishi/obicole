<div class="form-group">
    {!! Form::open(['route' => 'obiposts.search', 'method' => 'get']) !!}
        {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'キーワードで検索']) !!}
        {!! Form::button('<i class="fas fa-search"></i>　検索', ['class' => "btn btn-info", 'type' => 'submit']) !!}
    {!! Form::close() !!}
</div>
