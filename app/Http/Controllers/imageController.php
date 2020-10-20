<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;

class imageController extends Controller
{
	public function create(Request $request)
    {
        $images = new image();
        //$services->id=$request->input('id');
        $images->img_1 = $request->input('img_1');
       	$images->img_2= $request->input('img_2');

       if($request->hasfile('img_1') && $request->hasfile('img_2'))
        {
        	$file1=$request->file('img_1');
        	$file2=$request->file('img_2');
        	$extention1=$file1->getClientOriginalExtension();
        	$extention2=$file2->getClientOriginalExtension();
        	$filename1='i1'.time().'.'.$extention1;
        	$filename2='i2'.time().'.'.$extention2;
        	//$file1->move('upload/images/',$filename1);
        	//$file2->move('upload/images/',$filename2);
          $path1=$request->file('img_1')->move(public_path("/"),$filename1);
             $path2=$request->file('img_2')->move(public_path("/"),$filename2);
        	
         
          $images->img_1=url('/',$filename1);
          $images->img_2=url('/',$filename2);
  }
          
        
        else
        {
        	return $request;
        	$images->img_1='';
        	$images->img_2='';
        }

       
        $images->save();
        return response()->json(['url' => $images],200);
        
    }
    /*public function image()
    {
      return response()->download(public_path('upload/images/i11600595368.jpg'),'mechanic image');
    }*/
    public function image1(Request $request)
    {
      $filename=$request->file('img_1');
      $extends=$filename->getClientOriginalName();
      $path = $request->file('img_1')->move(public_path("/"),$extends);



  
       //$filename2="shopimage1.jpg";
    
   //$path1 = $request->file('img_2')->move(public_path("/"),$fileName2);

      $photoURL = url('/'.$extends);
     // $photoURL2 = url('/' $fileName2);
      return response()->json(['url'=> $photoURL],200);
       //return response()->json(['url'=> $photoURL2],200);
    }
    
}


