<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show
				<a href="child">go to child</a>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>