<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\startPageController; 
use App\Http\Controllers\acceptIncomingSiteData;
use App\Http\Controllers\MetricaPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//стартовая страница
Route::get('/', [startPageController::class, 'index'])->name('startPage');
Route::fallback([myErrController::class, 'err_404_not_found']);


//приветственная страница сайта-админки
Route::GET('/metrica',[startPageController::class, 'showMetricaPage'])->name('showMetricaPage');

//путь к контроллеру принимающему данные от сайтов
Route::POST('/acceptData', [acceptIncomingSiteData::class, 'acceptData'])->name('acceptData');

//маршруты для формы для добавления нового отслеживаемого сайта в список
Route::GET('/addSite',[MetricaPageController::class, 'showAddNewSiteForm'])->name('addNewSiteForm');
	Route::POST('/addSite',[MetricaPageController::class, 'addNewSite'])->name('doAdSite');

//служебные маршруты для работы js скриптов на сайте-админке (проверку входных параметров не делал, для упрощения)
Route::POST('/getRefsForSite', [MetricaPageController::class, 'getRefsForSite'])->name('getRefsForSite');
Route::POST('/getPageAllowedDates', [MetricaPageController::class, 'getPageAllowedDates'])->name('getPageAllowedDates');
Route::POST('/showMetrica', [MetricaPageController::class, 'showMetrica'])->name('showMetrica');

//авторизация для входа на сайт-админку
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
