<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
        <style>
            body{
                background-color: gray;
            }
            div{
                width: 35rem;
                margin: auto;
                margin-top: 5rem;
                padding-bottom: 1.40rem;
                text-align: center;
                border: 2px solid;
                background-color: antiquewhite;
            }
            
        </style>

    </head>
    <body>
        <div>
            <h1>Tabla de multiplicar</h1>
            <p>Escribe la tabla de multiplicar para empezar a jugar</p>
            <form name="formulario" method="POST" action="jugar">
                {{ csrf_field() }} 
                <input type="number" name="n" value=""/>
                <input type="submit" value="Jugar" name="jugar"/><br>
            </form>
        </div>
    </body>
</html>
