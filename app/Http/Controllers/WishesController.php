<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->wish($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unwished($id);
        return back();
    }

}
