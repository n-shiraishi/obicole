<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obipost;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ObipostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        
        $user = \Auth::user();
        $obiposts = Obipost::orderBy('created_at','desc')->paginate(20);

        $data = [
            'user' => $user,
            'obiposts' => $obiposts,
        ];

        return view('obiposts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obipost = new Obipost;
        
        return view('obiposts.create', [
            'obipost' => $obipost,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'content' => 'required|max:400',
            'book_title' => 'required|max:30',
            'book_author' => 'required|max:20',
            'myfile' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagefile = $request->file('myfile');
        
        if($imagefile != "") 
        {
            $now = date_format(Carbon::now(), 'YmdHis');
            $name = $imagefile->getClientOriginalName();
            $storePath="obipost/".$now."_".$name;
            
            $image = Image::make($imagefile)
                    ->resize(1024, null, function ($constraint) 
                    {
                        $constraint->aspectRatio();
                    });
            
            Storage::disk('s3')->put($storePath, (string) $image->encode(),'public');
            
            $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
            $obipost_image_path = $domain . $storePath;
        } else {
            $obipost_image_path = NULL;
        }

        $request->user()->obiposts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'obipost_image_path' => $obipost_image_path,
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obipost = Obipost::find($id);
        $user = $obipost->user_id;
        
        $data = [
            'obipost' => $obipost,
            'user' => $user,
        ];
        
        $data += $this->favcounts($obipost);
        
        return view('obiposts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obipost = Obipost::find($id);
        
        if(\Auth::id() === $obipost->user_id) {
            return view('obiposts.edit', [
                'obipost' => $obipost,
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obipost = Obipost::find($id);
        
        $this->validate($request,[
            'title' => 'required|max:50',
            'content' => 'required|max:400',
            'book_title' => 'required|max:30',
            'book_author' => 'required|max:20',
            'myfile' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imagefile = $request->file('myfile');
        
        if(\Auth::id() === $obipost->user_id) {
        
            if($obipost->obipost_image_path != NULL && $imagefile != NULL) {
                $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                $previous = str_replace("$domain", "", $obipost->obipost_image_path);
                $disk = Storage::disk('s3');
                $disk->delete($previous);
            }

            if($imagefile != "") 
            {
                $now = date_format(Carbon::now(), 'YmdHis');
                $name = $imagefile->getClientOriginalName();
                $storePath="obipost/".$now."_".$name;
                
                $image = Image::make($imagefile)
                        ->resize(500, null, function ($constraint) 
                        {
                            $constraint->aspectRatio();
                        });
                
                Storage::disk('s3')->put($storePath, (string) $image->encode(),'public');
                
                $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                $obipost_image_path = $domain . $storePath;
            } elseif($obipost->obipost_image_path != NULL) {
                $obipost_image_path = $obipost->obipost_image_path;
            } else {
                $obipost_image_path = NULL;
            }

            $obipost->title = $request->title;
            $obipost->content = $request->content;
            $obipost->book_title = $request->book_title;
            $obipost->book_author = $request->book_author;
            $obipost->obipost_image_path = $obipost_image_path;
            $obipost->save();
        
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obipost = Obipost::find($id);
        
        if(\Auth::id() === $obipost->user_id) {
        
            if($obipost->obipost_image_path !== NULL) 
            {
                $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
                $previous = str_replace("$domain", "", $obipost->obipost_image_path);
                $disk = Storage::disk('s3');
                $disk->delete($previous);
            }
        
            $obipost->delete();

            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    
        public function favorite_users($id)
    {
        $obipost = Obipost::find($id);
        $favorite_users = $obipost->favorite_users()->paginate(20);
        
        $data = [
            'obipost' => $obipost,
            'users' => $favorite_users,
        ];
        
        $data += $this->favcounts($obipost);

        return view('obiposts.favorite_users', $data);
    }
    
        public function wishing_users($id)
    {
        $obipost = Obipost::find($id);
        $wishing_users = $obipost->wishing_users()->paginate(20);
        
        $data = [
            'obipost' => $obipost,
            'users' => $wishing_users,
        ];
        
        $data += $this->favcounts($obipost);

        return view('obiposts.wishing_users', $data);
    }
    
    public function book_title($book_title)
    {
        $obiposts = Obipost::where('book_title', $book_title)->paginate(20);

        $data = [
            'obiposts' => $obiposts,
            'book_title' => $book_title,
        ];
        
        return view('obiposts.book_title', $data);
    }
    
        public function book_author($book_author)
    {
        $obiposts = Obipost::where('book_author', $book_author)->paginate(20);

        $data = [
            'obiposts' => $obiposts,
            'book_author' => $book_author,
        ];
        
        return view('obiposts.book_author', $data);
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        if(!empty($keyword))
        {
            $obiposts =  Obipost::where('book_title','like', '%' . $keyword . '%')
                        ->orWhere('book_author','like', '%' . $keyword . '%')
                        ->orWhere('title','like', '%' . $keyword . '%')
                        ->orWhere('content','like', '%' . $keyword . '%')
                        ->paginate(20);
                        
            return view('obiposts.search',[
                'obiposts' => $obiposts,
                'keyword' => $keyword,
            ]);
                
        } else {
            return back();
        }
    }
}
