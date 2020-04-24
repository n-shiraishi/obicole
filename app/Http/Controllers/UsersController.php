<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Obipost;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $obiposts = $user->obiposts()->paginate(10);
        
        $data = [
            'user' => $user,
            'obiposts' => $obiposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(20);
        
        $data = [
            'user' => $user,
            'obiposts' => $favorites,
        ];
        
        $data += $this->counts($user);

        return view('users.favorites', $data);

    }
    
        public function wishes($id)
    {
        $user = User::find($id);
        $wishes = $user->wishes()->paginate(20);
        
        $data = [
            'user' => $user,
            'obiposts' => $wishes,
        ];
        
        $data += $this->counts($user);

        return view('users.wishes', $data);

    }

}
