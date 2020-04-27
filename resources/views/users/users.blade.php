<ul class="list-unstyled mt-3">
    @foreach($users as $user)
        <li>
            <div class="d-flex d-inline-flex">
                <div class="p-2">
                    <img class="icon_image" src="{{ $user->icon_image_path }}">
                </div>
                <div class="p-2">
                    <h5 class="align-middle">{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</h5>
                </div>
            </div>
        </li>
    @endforeach
</ul>
