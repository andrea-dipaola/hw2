<!doctype html>
<html>
    <head>
        <title> @yield('title') </title>
        @yield('css')
        
        @yield('script')

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>

        <main>
            <div id="overlay"></div> 
            @yield('content')

        </main>


    </body>

</html>