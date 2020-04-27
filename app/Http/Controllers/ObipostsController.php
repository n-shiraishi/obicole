<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Obipost;

use App\User;

use Storage;

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
        $obiposts = Obipost::all();

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
            'title' => 'required|max:191',
            'content' => 'max:191',
            'book_title' => 'max:191',
            'book_author' => 'max:191',
        ]);
        
        // dd($request);
        $image = $request->file('myfile');
        // dd($image);
        $path = Storage::disk('s3')->putFile('obipost', $image, 'public');
        
        // dd($path);
        $obipost_image_path = Storage::disk('s3')->url($path);
        
        // dd($obipost_image_path);

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
            'title' => 'required|max:191',
            'content' => 'max:191',
            'book_title' => 'max:191',
            'book_author' => 'max:191',
        ]);
        
        if($obipost->obipost_image_path != NULL) {
            $domain='https://obicolebucket.s3.ap-northeast-1.amazonaws.com/';
            $previous = str_replace("$domain", "", $obipost->obipost_image_path);
            $disk = Storage::disk('s3');
            $disk->delete($previous);
        }
        
        $image = $request->file('myfile');
        $path = Storage::disk('s3')->putFile('obipost', $image, 'public');
        
        if(\Auth::id() === $obipost->user_id) {
            $obipost->title = $request->title;
            $obipost->content = $request->content;
            $obipost->book_title = $request->book_title;
            $obipost->book_author = $request->book_author;
            $obipost->obipost_image_path = Storage::disk('s3')->url($path);
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
}
