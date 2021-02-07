<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>

        <h1>Adivina el número</h1>
        <?php
        //session()->flush();
        if (session()->has('nAdivina')) {
            $nAdivina = session()->get('nAdivina');
            echo $nAdivina . '<br>';
        }
        if (isset($mensaje)){
            echo $mensaje . '<br>';
        }
        
        if (session()->has('intentos')) {
            $intentos = session()->get('intentos');
            echo 'Te quedan ' . $intentos . ' intentos';
        }
        ?>
        <form name="formulario" method="POST" action="intentar">
            {{ csrf_field() }} 
            <input type="number" name="numero" placeholder="Escribe aquí tu número"/><br>
            <input type="submit" value="Aceptar" name="Aceptar"/>
        </form>
    </body>
</html>
