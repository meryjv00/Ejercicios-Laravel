<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
        <style>
            body{
                background-color: gray;
            }
            div.tabla{
                width: 35rem;
                margin: auto;
                margin-top: 5rem;
                padding-bottom: 1.40rem;
                text-align: center;
                border: 2px solid;
                background-color: antiquewhite;
            }
            div{
                margin-top: 15px;
            }
            input{
                margin-top: 0.80rem;
            }
            input[type=button]{
                background-color: darksalmon;
            }
            input.operacion{
                background-color: peachpuff;
            }
        </style>

    </head>
    <body>
        <div  class="tabla">
            <h1>¡Perdiste!</h1>
            <h4>Solución: </h4>
            <?php
            for ($i = 0; $i < 10; $i++) {
                ?>
                <input type="button" class="operacion" value="<?= $tabla . ' * ' . ($i + 1) ?>"/>
                <input type="button"  value="="/>
                <input type="text"  class="operacion" name="respuesta[]" value="<?= $tabla * ($i + 1) ?>" style="background-color: peachpuff"/>
                <br>
                <?php
            }
            ?>
            <div>
                <a href="inicio">Volver a jugar</a>
            </div>
        </div>
    </body>
</html>
