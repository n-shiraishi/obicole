<ul class="list-unstyled mt-3">
    @foreach($users as $user)
        <li>
            <div class="d-flex d-inline-flex">
                <div class="m-2">
                    @if($user->icon_image_path === NULL)
                        <img class="icon_image" src="../images/iconmonstr-user-6-240 (1).png">
                    @else
                        <img class="icon_image" src="{{ $user->icon_image_path }}">
                    @endif
                </div>
                <div class="user_name m-2">
                    <h5 class="mb-0">{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</h5>
                </div>
            </div>
        </li>
    @endforeach
</ul>
