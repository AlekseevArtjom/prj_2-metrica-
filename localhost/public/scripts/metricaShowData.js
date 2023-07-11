(function(pathToControllerGetData, pathToControllerSelectYMD, nameInputToken, idBoxForRefs, idSitesUrlSelectlList, idDialogWindow, idMapBlock, idIframe){

/*
переменные модуля

pathToControllerGetData -- адрес контроллера для получения данных по кликам страницы сайта для выбранной даты (обработки запроса ajax)
pathToControllerSelectYMD -- адрес контроллера для получения доступных дат для страницы сайта (обработки запроса ajax)
nameInputToken -- name  input в котором хранится токен для использования в ajax
idBoxForRefs -- id блока где находится список ссылок выбранного сайта
idSitesUrlSelectlList -- id блока селект выбора сайта для отображения данных
idDialogWindow -- id  блока диалогового окна
idMapBlock -- id блока в котором будет отображаться карта кликов
idIframe -- id фрейма с рассматриваемым сайтом

*/


var postUrlGetData = pathToControllerGetData;
var postUrlSelectYMD = pathToControllerSelectYMD;
var currentToken = $("input[name="+nameInputToken+"]").val();
var listOfRefs = $("#"+idBoxForRefs+" ul");
var refsToPages ="#"+idBoxForRefs+" a"; 
var selectList= "#" + idSitesUrlSelectlList;
var dialogWindow = "#" + idDialogWindow;
var MapBlock = "#" + idMapBlock;
var iFrame = "#" + idIframe;


//добавляем слушателя на событие выбор сайта из выпадающего списка
$(selectList).on('change', findRefs);  

//добавляем слушателя на событие нажатие на ссылке выбранного сайта
function findRefs(){
			setTimeout(function(){ $(refsToPages).click(selectMetricDataToShow);}, 500);
}

//добавляем слушателя на событие message, получаемое от iframe при загрузке в него нужного нам сайта для отображения карты кликов
window.addEventListener('message', function (e) { 
		
		//вид входящего сообщения {"height": '+document.body.scrollHeight + ', "width": '+document.body.scrollWidth+'}		

		let frameIncomingData = JSON.parse(e.data);
		
		//ставим размер фрейма по размеру body сайта, избавляемся от прокрутки
		document.querySelector(iFrame).height = frameIncomingData.height * 1.3;
		document.querySelector(iFrame).width = frameIncomingData.width * 1.3;
});



//инициализируем диалоговое окно 
	$(dialogWindow).dialog({resizable: false, modal: true, autoOpen: false, height: 100});
	$("span.ui-dialog-title").text('Выбор даты для показа статистики'); 
//добавляем слушателей на кнопки диалогового окна
	$(dialogWindow +' input[value="Отмена"]').click(function(){$(dialogWindow +' select').val({}); $(dialogWindow).dialog('close');});
	$(dialogWindow +' input[value="Выбрать"]').click(function(){	//console.log('adding.....');
		
		var selectedDate = $(dialogWindow +' select').val();
		
		if(selectedDate == null || selectedDate == '' || selectedDate == undefined) return;
		let data=JSON.parse(selectedDate); // console.log(data);
		var selectedDateMarker = data.day + "." + data.month + "." + data.year ; 
		//console.log(selectedDateMarker);

		//для выбранной даты загружаем данные и визуализируем их в нашей админке
		$.post(postUrlGetData, {data, "_token": currentToken}, callbackData);
		function callbackData(dataReturned){
			
			//console.log(dataReturned);
			let data= JSON.parse(dataReturned); 
			console.log(data);
	
			showGraphics(data);
			showClickMap(data);


			function showGraphics(data){

					//инициализируем график плагина канвас
		//CANVAS START	

		var options = {
			animationEnabled: true,  
			title:{
				text: "Количество кликов по часам для выбранной даты "+selectedDateMarker
			},
			axisX: {
				title: "Время, ч",
				valueFormatString: "#"
			},
			axisY: {
				title: "Количество кликов, шт",
				//prefix: "число кликов"
			},
			data: [{
				yValueFormatString: "Клики(шт): ###",
				xValueFormatString: "Время(ч): #",
				type: "spline",
				dataPoints: [
					{ x: 0, y: 0 },
					{ x: 1, y: 0 },
					{ x: 2, y: 0 },
					{ x: 3, y: 0 },
					{ x: 4, y: 0 },
					{ x: 5, y: 0 },
					{ x: 6, y: 0 },
					{ x: 7, y: 0 },
					{ x: 8, y: 0 },
					{ x: 9, y: 0 },
					{ x: 10, y: 0 },
					{ x: 11, y: 0 },
					{ x: 12, y: 0 },
					{ x: 13, y: 0 },
					{ x: 14, y: 0 },
					{ x: 15, y: 0 },
					{ x: 16, y: 0 },
					{ x: 17, y: 0 },
					{ x: 18, y: 0 },
					{ x: 19, y: 0 },
					{ x: 20, y: 0 },
					{ x: 21, y: 0 },
					{ x: 22, y: 0 },
					{ x: 23, y: 0 }
				]
			}]
		};

		//рассчитываем количество кликов на сайте по часам
		//console.log(options.data[0].dataPoints[2].y);
		//console.log("input------"+data[0].hour);
		for(let i=0; i<data.length; i++){
			let interval = data[i].hour;
			options.data[0].dataPoints[interval].y ++;
		}
	
		//строим график
		$("#graphicsClicksTimes").CanvasJSChart(options);

		//CANVAS END

			} //закрываем функцию showGraphics




		function showClickMap(data){
		
			//открываем нужную страницу сайта в iframe
			let sitePageUrl = data[0].url;  
			let targetFrameBox = $(MapBlock);
		
			targetFrameBox.find('iframe').attr('src', sitePageUrl);
			targetFrameBox.css('display', 'block');

			
			//позиционируем клики относительно блока с iframe, размещая их на местах реальных кликов на сайте
			targetFrameBox.find('div').remove();
			for(let j=0; j< data.length; j++){
				targetFrameBox.append('<div id="'+data[j].x+'__'+data[j].y+'" style="width: 5px; height: 5px; border-radius: 50%; background-color: red;'+
							' position: absolute; top: '+data[j].y+'px; left: '+data[j].x+'px; z-index: 20;"></div>');
				console.log('x='+data[j].x+ ' y='+data[j].y );
			}
		
		} //закрываем функцию showClickMap
	
		} //закрывающая скобка функции callbackData

	$(dialogWindow +' select').val(''); $(dialogWindow).dialog('close');
	});




function selectMetricDataToShow(e){

	e.preventDefault();
	
	//получаем с сервера доступные даты, для которых есть статистика для данной страницы
	$.post(postUrlSelectYMD, {'id': e.target.name, '_token': currentToken}, callbackYMD);
	function callbackYMD(dataReturned){
			
			var targetSelect=$(dialogWindow + ' select');

		//console.log(dataReturned);
		let data= JSON.parse(dataReturned); //console.log(data);
			targetSelect.html('');
			targetSelect.append('<option value="">Выберите дату</option>');
			
		if(data.length!=0){	
			for(let i=0; i<data.length;i++){
				let dataForRef = '{"id" : '+ e.target.name+', "year" : '+data[i].year +', "month" :'+ data[i].month+', "day" :'+ data[i].day+'}';
				
				targetSelect.append('<option value="">'
							+data[i].year+'-' + data[i].month + '-' + data[i].day + '</option>');
				targetSelect.find('option')[i+1].value=dataForRef;
				//console.log(targetSelect.find('option')[i+1].value);	
			}
		}
	} 

	//открываем диалоговое окно для запроса даты из предложенного списка
	$(dialogWindow).dialog('open'); 
	
}








})('http://127.0.0.1:8000/showMetrica', 'http://127.0.0.1:8000/getPageAllowedDates', '_token', 'refsOfCurrentSiteList', 'urlList', 'dialogSetDate', 'ClickMap', 'frameSite');

console.log('show data module starts!');