<!doctype html>
<html>
    <head>
        <title> Nuova recensione </title>
        <link rel='stylesheet' href="{{ asset('css/create_review.css')}}"/>
        <script src="{{ asset('js/create_review.js')}}" defer></script> 

        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <nav>
                <a href="{{ route('home') }}"> Home</a>
                <a href="{{ route('logout') }}"> Logout</a>
            </nav>

            <section id="newrecensione">
                <h1> Inserisci recensione locale </h1> 
                <form name="recensione_form" method="post" action="{{ route('create_review') }}"> 
                    @csrf
                    <div>
                        <label> Nome locale <br> <input type="text" name="nome_locale"> </label>
                         
                    </div>

                    <div>
                        <label> Voto <br> <input type="text" name="voto" id="votazione"></textarea> </label>  
                        <span id="voto_span"></span>
                    </div>

                    <div>
                        <label> Descrizione <br> <textarea name="descrizione"></textarea> </label>  
                        
                    </div>

                    <label> <input type="submit" name="invio" value="Pubblica recensione"> </label>
                        
                </form>
                    
                    

            </section>

        </header>
    </body>


</html