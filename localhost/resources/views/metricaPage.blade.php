@extends('layouts.base')


@push('stylesheets_for_metrica')
	<link type="text/css" rel="stylesheet" href="styles/metricaMainStyle.css"/>
	<link type="text/css" rel="stylesheet" href="styles/metricaMainPageStyle.css"/>

	<link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.12.1.custom/jquery-ui.min.css" />
	<link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css" />
	<link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css" />
@endpush


@push('scripts_for_metrica')
	<script src="scripts/metricaPageLoader.js" type="text/javascript"></script>
@endpush


@section('title')
	MetricaPage
@endsection


@section('main')

	<h1>Обработка метрики сайтов</h1> 
	@if(isset($error_msg) && $error_msg!=null && $error_msg!='')<p>{{$error_msg}}</p>
	@endif

	
	<div id="addSitePage"><a href="{{route('addNewSiteForm')}}">Добавить новый сайт</a></div>

	<div id="siteList">
		<h3>Список обслуживаемых сайтов</h3>
		<select id="urlList">
				<option value="0">Выберите сайт для показа метрики</option>
			@for($ii=0; $ii<count($siteUrl); $ii++)
				<option value="{{$siteUrl[$ii]->id}}">{{$siteUrl[$ii]->site_domain}}</option>
			@endfor
		</select>
	</div>

	<div id="refsOfCurrentSiteList">
		<h3>Страницы сайта</h3>
		<p>Кликните на ссылку, чтобы показать данные</p>
		<ul></ul>
	</div>


	<div id="graphicsClicksTimes"></div>
	<div id="ClickMap"> <iframe id="frameSite" name="SitePageArea" src=""></iframe> </div>


<div id="dialogSetDate" style="display: none">
		<select></select>
		<input type="button" value="Выбрать"/>
		<input type="button" value="Отмена"/>
	</div>






	
	@csrf
@endsection('main')


