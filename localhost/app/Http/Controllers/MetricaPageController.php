<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Site;
use App\Page;
use App\Click;

class MetricaPageController extends Controller
{
	//отобразить форму для добавления нового сайта к списку отслеживания
	public function showAddNewSiteForm(){
	
		return view('addSiteForm', ['error_msg'=>'']);
	}

	//добавить новый сайт для отслеживания
	public function addNewSite(Request $request){

		$validationRules=['siteDomainURL'=>'required|url']; 
		$errorMsg=['siteDomainURL.required'=>'Заполните поле адреса сайта!', 
					'siteDomainURL.url'=>'Неправильный формат адреса сайта!'
					];	

		$validator_my=Validator::make($request->only('siteDomainURL'), $validationRules, $errorMsg);
		$newSiteURL=$validator_my->validate();

		if( Site::where('site_domain', $newSiteURL)->exists() ){
			return view('metricaPage',['error_msg'=>'Данный сайт уже обслуживается метрикой!']);
		}
		else{
			Site::create(['site_domain'=>$newSiteURL]);
			return view('metricaPage',['error_msg'=>'Сайт добавлен!']);
		}

	}

	//передать сценарию js ссылки на страницы выбранного отслеживаемого сайта
	public function getRefsForSite(Request $request){
		
		$dataReturned = Page::where('sites_id', $request->only('id'))->get(['id', 'page_full_url']);
		return json_encode($dataReturned);
	}

	//передать js сценарию все данные по кликам на выбранной странице отслеживаемого сайта для выбранной даты
	public function showMetrica(Request $request){

		/*
		SELECT clicks.x_coord, clicks.y_coord, clicks.hour, clicks.minute, clicks.second, pages.page_full_url 
			FROM clicks JOIN pages ON pages.id = clicks.pages_id
			WHERE clicks.pages_id = 13 AND clicks.year=2023 AND clicks.month=3 AND clicks.day=2
		*/
		
		$clicks = Click::select('clicks.x_coord as x', 
					'clicks.y_coord as y', 
					'clicks.hour as hour', 
					'clicks.minute as minute', 
					'clicks.second as second', 
					'pages.page_full_url as url')->
					join('pages', 'pages.id', '=', 'clicks.pages_id')->
											where('clicks.pages_id', $request->only('data.id')    )->
											where('clicks.year',     $request->only('data.year')  )->
											where('clicks.month',    $request->only('data.month') )->
											where('clicks.day',      $request->only('data.day')   )->get();
		
		return json_encode($clicks); 
	}

	//передать сценарию js даты, для которых имеются данные для выбранной страницы отслеживаемого сайта
	public function getPageAllowedDates(Request $reuqest){
		
		$allowedDates= Click::where('pages_id', $reuqest->only('id'))->groupBy('year', 'month', 'day')->get(['year', 'month', 'day']); 
		return json_encode($allowedDates);
	}


}
