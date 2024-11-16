<?php

namespace App\Http\Controllers;

use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function createproduct(Request $request){
      $name=$request->input('name');
      $description=$request->input('description');
      $price=$request->input('price');
      $brand=$request->input('brand');

      $filepath='C:\laragon\www\blog\public\products_list.json';
      $filecontent= file_get_contents($filepath);
      $jsoncontent= json_decode($filecontent,true);
      $payload=[
        'name'=> $name,
        'description'=> $description,
        'price'=> $price,
        'brand'=> $brand,
      ];
      if(!$jsoncontent || !is_array($jsoncontent)){
        $content=[$payload];
        file_put_contents($filepath,json_encode( $content));
      }
else{
    $jsoncontent[]=$payload;
    file_put_contents($filepath,json_encode( $jsoncontent));


}
      return response()->json(['message'=> 'sucsessful', 'data'=> $payload]);
    }
    public function deleteproductbyid($productId){
      $filepath='C:\laragon\www\blog\public\products_list.json';
      $filecontent= file_get_contents($filepath);
      $jsoncontent= json_decode($filecontent,true);
      if($productId<0 or $productId > count($jsoncontent)){
        return response()->json(['message'=> 'Invalid ID']);
      }
      else{
        unset($jsoncontent[$productId-1]);
        file_put_contents($filepath,json_encode($jsoncontent));
        return response()->json(['message'=> 'succsesfully']);

      }



    }
    public function listAllproducts(){
      $filepath='C:\laragon\www\blog\public\products_list.json';
      $filecontent= file_get_contents($filepath);
      $jsoncontent= json_decode($filecontent,true);
        if(!$jsoncontent || !is_array($jsoncontent)){
        return response()->json(['message'=> 'empty']);

      }
else{
    
  return response()->json(['message'=> 'suscsseful', 'data'=> $jsoncontent]);
}

    }

  public function updateproduct(Request $request, $indexnumber){

    $new_name=$request->input('name');
      $new_description=$request->input('description');
      $new_price=$request->input('price');
      $new_brand=$request->input('brand');

    $filepath='C:\laragon\www\blog\public\products_list.json';
    $filecontent= file_get_contents($filepath);
    $jsoncontent= json_decode($filecontent,true);
    if($indexnumber<0 or $indexnumber > count($jsoncontent)){
      return response()->json(['message'=> 'Invalid ID']);
    }else{ $newpayload=[
      'name'=> $new_name,
      'description'=> $new_description,
      'price'=> $new_price,
      'brand'=> $new_brand,
    ];
    $jsoncontent[$indexnumber-1]=$newpayload;

      file_put_contents($filepath,json_encode($jsoncontent));
      return response()->json(['message'=> 'succsesfully']);
   


    }

  }
 
    


}

