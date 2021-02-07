<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicial</title>
       
    </head>
    <body>
        <form name="formulario" method="POST" action="recoger">
            {{ csrf_field() }} 
            <input type="text" name="nombre" placeholder="Escribe aquí..."/><br>
            <input type="number" name="edad"><br>
            <input type="submit" value="Aceptar" name="Aceptar"/>
        </form>
    </body>
</html>
