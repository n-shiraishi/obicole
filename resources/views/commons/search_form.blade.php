<div class="search_form">
    <div class="form-inline">
        {!! Form::open(['route' => 'obiposts.search', 'method' => 'get']) !!}
            {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'フリーワードを入力']) !!}
            {!! Form::button('<i class="fas fa-search"></i>　検索', ['class' => "btn btn-light search_button", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
</div>
