<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class my_controller extends Controller
{
    public function check_user(){
        $name=request()->query('user_name');
        if(isset($name))
        {return 'welcom';}else
        { return response()->json([
            'message'=>'you have to fill user_name'
        ]);
    }}
       
//             $filecontent=file_get_contents( 'http://localhost:8000/json_file.json');
//             $jsoncontent= json_decode($filecontent,true);
//             if(in_array($name,$jsoncontent)){
//                 return response()->json(['message' => sprintf('%s is invalid supplied name',$name)]);
//             }
       
//             return response()->json([
//                 'message'=>'welcome'
//             ]);
//     }
// }
}
