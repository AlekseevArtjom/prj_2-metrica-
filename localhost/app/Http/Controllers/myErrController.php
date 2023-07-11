<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 

class myErrController extends Controller
{
    public function err_404_not_found(){ 
		return response('404 Page not found!!!')->header('Content-Type', 'text/plain');			 
					}
}








