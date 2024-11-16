<?php

namespace App\Http\Controllers;
use App\Models\post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $this->validatePost();
        post::create([
            'title'=> request('title'),
            'body'=> request('body'),
            'author'=> request('author'),
           ]);
           return redirect('/posts');
           
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=post::FindOrfail($id);
        $comments=$post->comments()->where('approved',1)->get();
        return view('posts.show',compact(['post','comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
       
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(post $post)
    {
       $this->validatePost();
        $post->update([
            'title'=> request('title'),
            'body'=> request('body'),
            'author'=> request('author')
        ]);
        return redirect('posts/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('posts')->where('id',1)->delete();
    }
    public function search(Request $request){
        if($request->isMethod('post')){
            $name=$request->get('name');
            $posts=post::where('title','LIKE','%'.$name.'%')->get();
        
            return view('posts.search',compact('posts'));}
        
    }
    public function validatePost(){
        request()->validate([
            'title' => 'required|unique:posts',
            'body' =>'required' ,
            'author' => 'required'

        ]);
    }
   
}

