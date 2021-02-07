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
        Ver personas que han realizado algún pedido.<br>

        <?php
        if ($pers) {
            foreach ($pers as $p) {
                echo $p['dni'] . ' ';
                echo $p['nombre'] . ' ';
                echo $p['tfno'] . '<br>';
            }
        } else {
            echo 'No se han encontrado datos.';
        }
        ?>
        <a href="volver">Volver</a>
    </body>
</html>
