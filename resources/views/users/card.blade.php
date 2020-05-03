<div class="card col-sm-12 mb-2">
    <div class="card-body">
        <h5 class="card-title text-center mb-3">{{ $user->name }}</h5>
            <p class="card-text">
                @if($user->icon_image_path === NULL)
                    <img width=100% height="auto" src="{{ url('images/iconmonstr-user-6-240 (1).png') }}" alt="ユーザアイコン画像">
                @else
                    <img width=100% height="auto" src="{{ $user->icon_image_path }}" alt="ユーザアイコン画像">
                @endif
            </p>
    </div>
</div>
@if(Auth::id() == $user->id)
    <div class="text-right">
        {!! link_to_route('users.edit', 'プロフィールを変更', ['id' => $user->id], ['class' => 'btn btn-outline-success btn-sm']) !!}
    </div>
    
    <div class="text-right">
        <button type="button" class="btn btn-outline-dark btn-sm mt-2" data-toggle="modal" data-target="#exampleModalCenter">
          ユーザーを削除する
        </button>
        
        <!-- モーダルの設定 -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">"{{ $user->name }}"を削除しますか？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>このユーザーを削除すると、ユーザーのデータも削除されます。</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">閉じる</button>
                {!! Form::open( ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                  {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        
        
    </div>
        {!! link_to_route('obiposts.create', '記事を投稿する', [], ['class' => 'btn btn-block btn-secondary mt-4']) !!}
@endif
