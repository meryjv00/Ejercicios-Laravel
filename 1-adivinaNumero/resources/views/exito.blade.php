<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <?php
        echo $mensaje . '<br>';
        echo 'El número era: ' . session()->get('nAdivina') . '<br>';
        session()->flush();
        ?>
        <a href="portada">Volver a jugar</a>
    </body>
</html>
