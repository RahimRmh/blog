<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\name;
use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommment;

class commentscontroller extends Controller
{
    public function store(StoreCommment $request,post $post){
        comment::create([
            'name' => request('name'),
            'body' => request('body'),
            'post_id' => $post->id

        ]);
        return back();
    }
}
