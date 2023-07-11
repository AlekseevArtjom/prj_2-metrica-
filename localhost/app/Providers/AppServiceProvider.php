<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator; //для использования фасада Validator
use Illuminate\Support\Facades\Blade; //для задания псевдоника включаемому шаблону //для написания деректив шаблонизатора
use Illuminate\Support\Facades\View;  //для задания переменных доступных для всех шаблонов видов
use Illuminate\Pagination\Paginator; // для изменения фреймворка отрисовки вида пагинатора по умолчанию
use Illuminate\Support\Facades\Gate; //для создания своих гейтов


class AppServiceProvider extends ServiceProvider
{
	
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		
		



    }
}
