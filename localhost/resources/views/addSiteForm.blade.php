@extends('layouts.base')


@push('stylesheets_for_metrica')
	<link type="text/css" rel="stylesheet" href="styles/metricaMainStyle.css"/>
@endpush

@push('stylesheets_for_metrica')
	<link type="text/css" rel="stylesheet" href="styles/metricaMainPageStyle.css"/>
@endpush

@section('title')
	MetricaPage::addSite
@endsection


@section('main')

<h1>Добавление нового сайта</h1>

<form method="POST" action="{{route('doAdSite')}}">
	@csrf
	<input type="text" name="siteDomainURL" placeholder="Введите полный url адрес сайта" value="{{old('siteDomainURL')}}" />
	<input type="submit" value="Добавить" />
	<input type="button" value="Отмена" onclick="(function(){window.location.href='{{route('showMetricaPage')}}';})();" />
</form>
@error('siteDomainURL') {{$message}} @enderror

@endsection('main')


