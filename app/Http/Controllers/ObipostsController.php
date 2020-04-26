<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Obipost;

use App\User;

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
        
        $request->user()->obiposts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
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
        
        if(\Auth::id() === $obipost->user_id) {
            $obipost->title = $request->title;
            $obipost->content = $request->content;
            $obipost->book_title = $request->book_title;
            $obipost->book_author = $request->book_author;
            $obipost->image_path = $request->image_path;
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
}
