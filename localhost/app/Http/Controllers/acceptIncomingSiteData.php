<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Page;
use App\Click;


class acceptIncomingSiteData extends Controller
{
	public function acceptData(Request $request){
	
		//получаем входящие данные со стороннего сайта, расшифровываем их и записываем в объект
		$incomingDataRow=$request->all('input_data');
		$incomingData=json_decode($incomingDataRow['input_data']);
		
		//проверяем есть ли домен сайта, приславшего данные, в таблице 'sites' нашей базы данных т.е. обслуживается ли этот сайт нашей метрикой или нет 
		$site_present_here= Site::where('site_domain', $incomingData->siteUrl)->exists();
		if(!$site_present_here) exit;

		//если сайт обслуживается метрикой, принимаем данные и записываем в таблицы базы данных
		$current_domain= Site::where('site_domain', $incomingData->siteUrl)->get();

		for($ii=0; $ii < count($incomingData->clicksOnSitePage); $ii++){
			
			//проверяем есть ли уже такой url страницы
			$current_url = $incomingData->clicksOnSitePage[$ii]->currentUrl;
			if( !(Page::where('page_full_url', $current_url)->exists()) ){

				$current_page = Page::create(['sites_id'=>$current_domain[0]->id, 'page_full_url'=>$current_url]); 
					//можно было бы конечно в БД дать полю sites_id default значение или свойство nullable, чтобы воспользоваться функцией associate,
					// но это нарушило бы целостность данных в БД (можно было бы создать запись об url страницы не привязанной к отслеживаемому сайту)
			} 
			else {
				$current_page = Page::where('page_full_url', $current_url)->get(); $current_page=$current_page[0];
			}

			//пишем данные по текущему клику
			Click::create([	'pages_id'=>$current_page->id, 
					'x_coord'=>$incomingData->clicksOnSitePage[$ii]->x, 
					'y_coord'=>$incomingData->clicksOnSitePage[$ii]->y, 
					'year'=>$incomingData->clicksOnSitePage[$ii]->year, 
					'month'=>$incomingData->clicksOnSitePage[$ii]->month, 
					'day'=>$incomingData->clicksOnSitePage[$ii]->day, 
					'hour'=>$incomingData->clicksOnSitePage[$ii]->hour, 
					'minute'=>$incomingData->clicksOnSitePage[$ii]->minute, 
					'second'=>$incomingData->clicksOnSitePage[$ii]->second]);
			 
		}
		
		
		
	}


}
