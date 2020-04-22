<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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
        
        return view('users.show', $data);
    }
}
