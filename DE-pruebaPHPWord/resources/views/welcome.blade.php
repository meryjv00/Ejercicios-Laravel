<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <form name="formulario" action="generarWord">
            {{ csrf_field() }}
            <input type="text" name="unacosa" placeholder="Escribe algo aquí...."/>
            <input type="text" name="otracosa" placeholder="Escribe otra cosa"/>
            <input type="submit" name="generarWord" value="generarWord">
        </form>
    </body>
</html>
