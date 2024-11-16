<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;

class nameController extends Controller
{
    public function names(){
        $capitilize=[];
        $names= project::all();
        foreach($names as $name){
         $user_name= strtoupper( $name->name );
         
         array_push($capitilize,$user_name);
        }
        return response()->json(["users"=> $capitilize]);
    //   print_r($capitilize);
}}
