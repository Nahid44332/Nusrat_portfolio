<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nusrat Jahan</title>
	
    @include('Frontend.includes.style')
</head>
<body class="index-page portfolio-details-page">
	
 @include('Frontend.includes.navbar')
	<main class="main">
		@yield('content')
	</main>



    @include('Frontend.includes.footer')
	@include('Frontend.includes.script')

	    @stack('script')

</body>
</html>