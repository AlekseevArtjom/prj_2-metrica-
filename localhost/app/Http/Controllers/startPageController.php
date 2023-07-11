<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class startPageController extends Controller
{
    
	public function index(){
		
		return view('startPage');	
	}

	//отобразить главную страницу сайта-админки после авторизации пользователя
	public function showMetricaPage(){

		$siteUrl=Site::select('site_domain', 'id')->get();
		return view('metricaPage', ['siteUrl'=>$siteUrl]);
	}

}
