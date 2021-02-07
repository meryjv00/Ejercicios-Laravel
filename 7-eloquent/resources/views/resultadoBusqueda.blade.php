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

        <?php
        if ($pers != null) {
            echo 'Datos de la persona buscada.<br>';
            echo 'DNI: ' . $pers->dni . '<br>';
            echo 'Nombre: ' . $pers->nombre . '<br>';
            echo 'Telefono: ' . $pers->tfno . '<br>';
        } else {
            echo 'Persona no encontrada.<br>';
        }
        ?>
        <a href="volver">Volver</a>
    </body>
</html>
