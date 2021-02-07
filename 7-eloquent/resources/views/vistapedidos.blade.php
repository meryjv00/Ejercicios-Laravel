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
        Pedidos realizados en la app.<br>
        <?php
        foreach ($ped as $p) {
            echo $p->id . ': ';
            echo $p->fecha . ', Cliente: ';
            echo $p->dni . ', Número de artículos: ';
            echo $p->nArticulos . '<br>';
        }
        ?>
        <a href="volver">Volver</a>
    </body>
</html>
