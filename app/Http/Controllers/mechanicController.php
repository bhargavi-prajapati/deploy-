<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mechanic;
use App\image;
use App\time;
use App\service;

class mechanicController extends Controller
{
     public function create(Request $request)
    {
    	$mechanics = new mechanic();
    	$mechanics->image_id = $request->input('image_id');
    	$mechanics->shop_name = $request->input('shop_name');
    	$mechanics->phone_number = $request->input('phone_number');
    	$mechanics->address = $request->input('address');
    	$mechanics->pin_code = $request->input('pin_code');
    	$mechanics->city = $request->input('city');
    	$mechanics->state = $request->input('state');
    	$mechanics->service_id = $request->input('service_id ');
    	$mechanics->time_id = $request->input('time_id  ');
        $mechanics->latitude= $request->input('latitude');
        $mechanics->longitude = $request->input('longitude');


    	$mechanics->save();
    	return response()->json($mechanics);
    }
     public function fetchdata(Request $request)
 {
 	


        $mechanics=mechanic::leftjoin('services','services.id','=','mechanicshops.service_id')->leftjoin('images','images.id','=','mechanicshops.image_id')->leftjoin('times','times.id','=','mechanicshops.time_id')->get();
           // dd( $mechanics);
      // $mechanics=mechanic::all();
        
           /* $i=0;
         foreach ($mechanics as $mechanic)
          {
            $image=image::find($mechanic->image_id);
             $mechanic['img_1']=$image->img_1;
             $mechanic['img_2']=$image->img_2;

             $time=time::find($mechanic->time_id);
          
           $mechanic['open_time']=$time->open_time;
             $mechanic['close_time']=$time->close_time;
              $mechanic['weekday']=$time->weekday;
            
           $services=service::find($mechanic->service_id);
           $mechanic['services']=$services->services;
           $mechanic['description']=$services->description;
            
        
             

           

         
         }*/
         return response(json_encode($mechanics));
            

        
	}





}

