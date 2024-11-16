<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FisrtController extends Controller
{
    public function check_user_name(){
        $name=request()->query('user_name');
        if(!isset($name)){
            return response()->json([
                        'message'=>'you have to fill user_name'
            ]);
        }

    $filecontent=file_get_contents('http://localhost:8000/json_file.json');
    $jsoncontent=json_decode($filecontent,true);


        if(in_array($name,$jsoncontent)){
            return response()->json(['message'=> 'welcome!']);
        }
        return response()-> json(['message'=>'error']);
    }
}

// public function checkusername(){
//     $name=request()->query('user_name');
//     if(isset($name))
//     { return response()->json([
//         'message'=>'you have to fill user_name'
//     ]);
    
   
//         $filecontent=file_get_contents( 'http://localhost:8080/json_file.json');
//         $jsoncontent= json_decode($filecontent,true);
//         if(in_array($name,$jsoncontent)){
//             return response()->json(['message' => sprintf('%s is invalid supplied name',$name)]);
//         }
   
//         return response()->json([
//             'message'=>'welcome'
//         ]);
// }
// }}
