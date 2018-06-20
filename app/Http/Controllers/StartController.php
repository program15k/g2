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
       $data=array('date'=> array(array('year'=>$y,'month'=>$m,'day'=>$d,'time'=>$time)));
        header('Access-Control-Allow-Origin: tred');
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
}
