(function(idSitesUrlSelectlList, pathToController, nameInputToken, idBoxForRefs, idGraphicsBox, idClicksMapBox){

/*
idSitesUrlSelectlList -- id блока селект выбора сайта для отображения данных
pathToController -- адрес контроллера для обработки запроса ajax
nameInputToken -- name  input в котором хранится токен для использования в ajax
idBoxForRefs -- id блока где находится список ссылок выбранного сайта
idGraphicsBox -- id  блока с графиком кликов
idClicksMapBox -- id блока с отображением карты кликов

*/


var selectList= "#" + idSitesUrlSelectlList;
var postUrl = pathToController;
var currentToken = $("input[name="+nameInputToken+"]").val();
var listOfRefs = $("#"+idBoxForRefs+" ul");
var graphicsBox = $("#graphicsClicksTimes");
var clickMapBox = $("#" + idClicksMapBox);

//добавляем слушателя на событие выбора сайта
$(selectList).on('change', getRefsForCurrentSite);


function getRefsForCurrentSite(){	
					
	var siteId = $(selectList).val(); 
	
	if(siteId!=0){
			$.post(postUrl, {'id': siteId, '_token': currentToken}, callback);
	}

	function callback(dataReturned){
		//console.log( dataReturned);
		//console.log( JSON.parse(dataReturned) );
		
		let data= JSON.parse(dataReturned);
		
		listOfRefs.html('');
				
		if(data.length!=0){
			listOfRefs.parent('div').fadeOut(50);			

			for(let i=0; i<data.length;i++)
				listOfRefs.append("<li><a href='' name='"+data[i].id+"'>"+data[i].page_full_url+"</a></li>");
			listOfRefs.parent('div').fadeIn(2000);
		}
		else {
			listOfRefs.parent('div').fadeOut(2000);
			graphicsBox.html('');
			clickMapBox.find('iframe').attr('src', '');
			clickMapBox.css('display', 'none');

			
		}
	}
}


})('urlList', 'http://127.0.0.1:8000/getRefsForSite', '_token', 'refsOfCurrentSiteList', 'graphicsClicksTimes', 'ClickMap');

console.log('get refs module starts!');