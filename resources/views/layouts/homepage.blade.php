<!doctype html>
<html>
    <head>
        <title> @yield('title') </title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
        @yield('css')
        
        @yield('script')

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
         <nav>
            <div id="links">
                @yield('links') 
            </div>
        </nav>

        <form id="form_ricetta" class="hidden">
            Inserisci un ingrediente <br>
            <input type="text" id="ricetta_text">
            <input type="submit" id="cerca_ricetta" value="Cerca">
        </form>

        <section id="podcast_value"></section>
        <section id="ricetta_value"></section>

        <header>
            <div id="overlay"></div> 
            <div id="text">
                @yield('text')
            </div>
           
        </header>

        <article>
            <div id="profile"> 
                <img src="https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png"/> 
                <p> {{ $user["nome"] }} {{ $user["cognome"] }} </p> 
            </div>

        </article>

        <section id="reviews"> </section>


    </body>

</html>