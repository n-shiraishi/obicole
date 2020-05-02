<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
use App\Obipost;
use Storage;
use Carbon\Carbon;

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
            'name' => 'required|max:20',
            'myfile' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if(\Auth::id() === $user->id) {
        
            if($user->icon_image_path !== NULL) 
            {
                $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                $previous = str_replace("$domain", "", $user->icon_image_path);
                $disk = Storage::disk('s3');
                $disk->delete($previous);
            }
            
            $imagefile = $request->file('myfile');
            
                if($imagefile != "") 
                {
                    $now = date_format(Carbon::now(), 'YmdHis');
                    $name = $imagefile->getClientOriginalName();
                    $storePath="icon/".$now."_".$name;
                    
                    $image = Image::make($imagefile)
                            ->resize(300, null, function ($constraint) 
                        {
                            $constraint->aspectRatio();
                        }); 
                    $image = $image->crop(300, 300);

                    Storage::disk('s3')->put($storePath, (string) $image->encode(),'public');
                    
                    $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                    $icon_image_path = $domain . $storePath;
                } else {
                    $icon_image_path = NULL;
                }
            
            $user->name = $request->name;
            $user->icon_image_path = $icon_image_path;
            $user->save();
        
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    
        public function destroy($id)
    {
        $user = User::find($id);
        
        if(\Auth::id() === $user->id) {
        
            if($user->icon_image_path !== NULL) 
            {
                $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                $previous = str_replace("$domain", "", $user->icon_image_path);
                $disk = Storage::disk('s3');
                $disk->delete($previous);
            }
            
            if(count($user->obiposts) > 0)
            {
                $obiposts = $user->obiposts;
                
                foreach($obiposts as $obipost)
                {
                    if($obipost !== null)
                    {
                        $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                        $previous = str_replace("$domain", "", $obipost->obipost_image_path);
                        $disk = Storage::disk('s3');
                        $disk->delete($previous);
                    }
                        
                }
            }
        
            $user->delete();

            return redirect('/');
        } else {
            return redirect('/');
        }
    }

}
