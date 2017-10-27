<html>

<head>

    <title>Amaze Cards</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.easy-pie-chart/1.0.1/jquery.easy-pie-chart.css">
   
    <link href="{{ asset('/css/global.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>

</head>

<body>

	@include ('partials.navbar')


	@yield('content')
	@yield('script')

</body>

</html>