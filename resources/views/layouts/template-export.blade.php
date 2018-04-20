<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="{{ asset('public/fonts/font.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/export.css') }}" rel="stylesheet">

		@yield('stylesheet')
	</head>

	<body>
		@yield('content')
		@yield('javascripts')
	</body>
</html>