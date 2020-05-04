<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Obipost;

class TopController extends Controller
{
    public function favorites_rank()
    {
        $obiposts = Obipost::withCount('favorite_users')->orderBy('favorite_users_count', 'desc')->paginate(20);
        
        $data = [
            'obiposts' => $obiposts,
        ];
        
        return view('top.favorites_rank', $data);
    }
    
        public function wishes_rank()
    {
        $obiposts = Obipost::withCount('wishing_users')->orderBy('wishing_users_count', 'desc')->paginate(20);
        
        $data = [
            'obiposts' => $obiposts,
        ];
        
        return view('top.wishes_rank', $data);
    }

}
