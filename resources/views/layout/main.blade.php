<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
{{--@section('sidebar')--}}
{{--    This is the master sidebar.--}}
{{--@show--}}

<div class="container">
    @yield('content')
</div>

<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
