<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;

class serviceController extends Controller
{
    public function create(Request $request)
    {
    	$services =new service();
    	$services->services = $request->input('services');
    	$services->description = $request->input('description');

		
		$services->save();
		return response()->json($services);



    }
}
