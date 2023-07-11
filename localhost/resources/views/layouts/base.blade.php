<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>my_metrica:: @yield('title', '________')</title>
	
	@stack('stylesheets_for_metrica')
	@stack('scripts_for_metrica')

</head>
<body>
@hassection('headline')
		@yield('headline')
@else   @includeIf('shared.defaultHeadline')
		@endif

 
	@yield('main')
	

@hassection('footer')
		@yield('footer')
@else   @includeIf('shared.defaultFooter')
		@endif

</body>
</html>
