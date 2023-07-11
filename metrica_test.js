(function(targetAdminUrl){

/*
параметру модуля
targetAdminUrl -- полный путь к контроллеру на сервере, принимающему данные метрики с сайта

*/

//вешаем слушатель на загрузку страницы (чтобы при загрузке данной страницы на нашу админку в ифрейм получить от страницы 
//ее высоту и ширину scrollHeight / scrollWidth и задать размер фрейма по ним)
window.addEventListener('load', function (){
						parent.postMessage('{"height": '+document.body.scrollHeight + ', "width": '+document.body.scrollWidth+'}', 
											'http://________домен нашей админки ________'+'/showMetrica');
});

//вешаем слушатель на событие клик левой кнопкой мыши
$(document).click(pickUpUserClicks);

//слушатель на уход со страницы
$(window).on("beforeunload", function(e){ sendStoredData();});

//объект для отправки данных на сервер
var dataToSend = {};
	
//двумерный массив для хранения данных по кликам на сайте
var userClicksData = [];

function pickUpUserClicks(e){
	
	var moment= new Date();

	let currentClick={};
		currentClick.x=e.pageX;
		currentClick.y=e.pageY;
		currentClick.year = moment.getFullYear();
		currentClick.month = moment.getMonth()+1;
		currentClick.day = moment.getDate();
		currentClick.hour = moment.getHours();
		currentClick.minute = moment.getMinutes();
		currentClick.second = moment.getSeconds();
		currentClick.currentUrl = window.location.href;
	
	userClicksData.push(currentClick);
}


function sendStoredData(e){ 
	
	dataToSend.siteUrl = window.location.origin;
	dataToSend.clicksOnSitePage = userClicksData;

	$.post(targetAdminUrl, 
		   'input_data='+JSON.stringify(dataToSend), 
		   function(dataReturned){ console.log("DATA RETURNED:  "); console.log(dataReturned); });

	userClicksData=[];
	dataToSend = {};
}


})('http://_____домен админки на сервере___/acceptData');