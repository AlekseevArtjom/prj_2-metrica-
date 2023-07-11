@extends('layouts.base')


@push('stylesheets_for_metrica')
	<link type="text/css" rel="stylesheet" href="styles/metricaMainStyle.css"/>
@endpush

@section('title')
	StartPage
@endsection


@section('main')

<h1>Добро пожаловать в админ-панель метрики!</h1>
 <a href="{{route('login')}}">Вход</a> 




<!--
<h3>Проверка работы входного модуля</h3>
<form method="POST" action="{{route('acceptData')}}" >
	@csrf
	<input type='text' name='input_data' value='

{"siteUrl":"http://localhost","clicksOnSitePage":[{"x":72,"y":68,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":12,"currentUrl":"http://localhost/"},
							{"x":42,"y":396,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":14,"currentUrl":"http://localhost/"},
							{"x":49,"y":311,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":15,"currentUrl":"http://localhost/"},
							{"x":96,"y":356,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":16,"currentUrl":"http://localhost/#contacts"},
							{"x":119,"y":362,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":16,"currentUrl":"http://localhost/#contacts"},
							{"x":135,"y":369,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":16,"currentUrl":"http://localhost/#contacts"},
							{"x":163,"y":298,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":18,"currentUrl":"http://localhost/#contacts"},
							{"x":124,"y":260,"year":2023,"month":7,"day":2,"hour":13,"minute":45,"second":19,"currentUrl":"http://localhost/#"}]}

					      ' />	

				
	<input type="submit" value="Отправить данные" />
</form>
{{route('showMetricaPage')}}

-->


@endsection('main')


