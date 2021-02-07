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
        Artículos solicitados en pedidos.<br>

        <?php
        if ($art) {
            foreach ($art as $a) {
                echo 'Número de serie: ' . $a['numeroSerie'] . ' ';
                echo $a['desc'] . ', Pedido nº: ';
                echo $a['idPedido'] . '<br>';
            }
        } else {
            echo 'No se han encontrado datos.';
        }
        ?>
        <a href="volver">Volver</a>
    </body>
</html>
