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
        <h1>Ver pedidos de un usuario</h1>
        <form action="verPedidosUsuario" name="formu" method="POST">
            {!! csrf_field() !!}
            DNI: <input type="text" name="DNIBuscado" value="" placeholder="DNI a buscar">
            <input type="submit" name="Buscar" value="Buscar">
        </form>
        <a href="volver">Volver</a>
    </body>
</html>
