<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
     
    </head>
    <body>
        <form action="insertarUsuario" name="formu" method="POST">
            {!! csrf_field() !!}
            DNI: <input type="text" name="DNI" value="" placeholder="DNI"><br>
            Nombre: <input type="text" name="Nombre" value="" placeholder="Nombre"><br>
            Teléfono: <input type="text" name="Tfno" value="" placeholder="Teléfono"><br>
            <input type="submit" name="Aceptar" value="Aceptar">
        </form>
        <a href="volver">Volver</a>
    </body>
</html>
