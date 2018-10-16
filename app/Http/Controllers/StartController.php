<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;
use App\Event;
class StartController extends Controller
{
  public function addreservation()
  {
      echo"jest git";
  }
    public function start()
    {
       $d=date('d');
       $m=date('m');
       $y=date('Y');
       $data=date('Y-m-d');
 
       $ile_dni_miecu=$this->dni_mies($m,$y);
       $flights = new Event;
       $wynik = $flights->whereBetween('event_date', ['2018-07-14', '2018-07-18'])->get();
       foreach($wynik as $stany)
       {
           $stan_na_dzien=$stany->toArray();

           for($i=1;$i<=$ile_dni_miecu;$i++)
            {
             $licznik_dat=$y.'-'.$m.'-'.$i;  
             $event_date=$stan_na_dzien['event_date'];
                  if(!isset($miech[$i]))
                      {
                      $miech[$i]='0';
                      }
                  if($event_date==$licznik_dat && $miech[$i]=='0')
                     {  
                     $miech[$i]=$stan_na_dzien['status'];
                     }

            }  
           
       }
       
       return $miech;
       
    }
    
 public function oddo(Request $request)
    {
     define('MINUTA',60);
     define('GODZINA',60*60);
     define('DOBA',60*60*24);
     define('TYDZIEN',60*60*24*7);
     define('ROK',60*60*24*365);
    
       $d=date('d');
       $m=date('m');
       $y=date('Y');
       $time=date('G-i-s');
       $mon_this=array('1'=>'4','2'=>'3','3'=>'2','4'=>'1','5'=>'0');
       
     //$wart=$request->all();
    // $tablicaa=implode('', $wart);
     //$tablica=explode(',', $tablicaa);
    // foreach($tablica as $rek)
    // { 
      //    $bit=explode(':',$rek);
      //    print_r($bit);
       //   if(count($bit)>1)
       //   {
       //     print $bit['1'];
            // Image::where('id', $bit[1])->update(['pozycja_img' => $bit[0]]);
        //  }
     //}
     //print_r($bit);
        //return response()->json(array('wartosc'=>'git','komunikat'=> 'Galeria zaktualizowana pomyślnie', '_token' =>csrf_token()), 200);
	
       
      
     $kalendar=$this->start();
     return response()->json(array('type'=>'week','year'=>$y,'month'=>$m,'day'=>$d,'time'=>$time,'mon_this'=>$kalendar), 200);
     
    }
    public function dni_mies($mies,$rok) 
            {
             $dni = 31;
             while (!checkdate($mies, $dni, $rok)) $dni--;
             return $dni;
            }
    
}
