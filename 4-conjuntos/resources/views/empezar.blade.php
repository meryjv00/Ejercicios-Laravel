<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
        <style>
            body{
                background-color: #4f424c;
            }
            div{
                width: 35rem;
                margin: auto;
                margin-top: 5rem;
                padding-bottom: 1.40rem;
                border: 2px solid;
                background-color: antiquewhite;
                text-align: center;
            }
            input{
                margin-left: 1rem;
            }
            ul{
                text-align: left;
                padding-left: 7rem; 
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Aprende Conjuntos</h1>
            <ul>
                <li>Añade, modifica y elimina elementos de un conjunto.</li>
                <li>Visualiza la unión e intersección de dos conjuntos.</li>
            </ul>

            <form name="formulario" method="POST" action="empezarJuego">
                {{ csrf_field() }}
                <input type="submit" value="Empezar" name="empezar"/><br>
            </form>
        </div>
    </body>
</html>
