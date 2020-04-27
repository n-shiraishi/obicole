<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\User;

use App\Obipost;

use Storage;

class UsersController extends Controller
{
    public function index ()
    {
        $users = User::all();
        
        return view('users.index', [
            'users' => $users,
        ]);
        
    }
    
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
    
    public function edit($id)
    {
        $user = User::find($id);
        
        if(\Auth::id() === $user->id) {
            return view('users.edit', [
                'user' => $user,
            ]);
        } else {
            return redirect('/');
        }
    }
    
        public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $this->validate($request,[
            'name' => 'required|max:191',
        ]);
        
        
        if($user->icon_image_path != NULL) {
            $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
            $previous = str_replace("$domain", "", $user->icon_image_path);
            $disk = Storage::disk('s3');
            $disk->delete($previous);
        }
        
        $image = $request->file('myfile');
        // $extension = $request->file('myfile')->getClientOriginalExtension();
        // $resize_img = Image::make($image)->resize(300,300);
        $path = Storage::disk('s3')->putFile('icon', $image, 'public');
        
        if(\Auth::id() === $user->id) {
            $user->name = $request->name;
            $user->icon_image_path = Storage::disk('s3')->url($path);
            $user->save();
    
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

}
