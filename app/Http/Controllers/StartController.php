<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
  
    public function start()
    {
        $d=date('d');
        $m=date('m');
        $y=date('Y');
        $time=date('G-i-s');
       $data=array(array('year'=>$y,'month'=>$m,'day'=>$d,'time'=>$time));
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
 public function oddo(Request $request)
    {
     
     $wart=$request->all();
     $tablicaa=implode('', $wart);
     $tablica=explode(',', $tablicaa);
     foreach($tablica as $rek)
     { 
          $bit=explode(':',$rek);
          print_r($bit);
          if(count($bit)>1)
          {
            print $bit['1'];
            // Image::where('id', $bit[1])->update(['pozycja_img' => $bit[0]]);
          }
     }
     //print_r($bit);
        //return response()->json(array('wartosc'=>'git','komunikat'=> 'Galeria zaktualizowana pomyślnie', '_token' =>csrf_token()), 200);
    }
    
}
