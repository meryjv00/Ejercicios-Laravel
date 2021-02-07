<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Éxito</title>

    </head>
    <body>
        Bienvenid@ 
        <?php
        //Variables del vector asociativo
        echo $nom . ' de ' . $ed . ' años <br>';
        if (session()->has('ses')) { //if isset($_SESSION['ses'])
            $varSe = session()->get('ses');
            echo $varSe;
        }
        //Elimina una variable de la sesión
        session()->forget('ses');
        //Elimina todas las variables de sesión
        session()->flush();
        ?>
        <a href="principal">Volver</a>
    </body>
</html>
