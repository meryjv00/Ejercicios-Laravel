<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tabla multiplicar</title>
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
        <?php
        if (!isset($colores)) {
            $colores = array();
            for ($i = 0; $i < 10; $i++) {
                $colores[$i] = "peachpuff";
            }
        }
        if (!isset($respuestas)) {
            $respuestas = array();
            for ($i = 0; $i < 10; $i++) {
                $respuestas[$i] = "";
            }
        }
        if (!isset($ganado)) {
            $ganado = false;
        }
        ?>
        <div class="tabla">
            <h1>Tabla del <?= $tabla ?></h1>
            <?php
            if ($ganado) {
                ?>
                <h2>¡Ganaste!</h2>
                <?php
            }
            ?>

            <h4>Intentos: <input type="button"  value="<?= $intentos ?>"/> </h4>
            <form name="formu" method="POST" action="comprobar">
                {{ csrf_field() }} 
                <?php
                for ($i = 0; $i < 10; $i++) {
                    ?>
                    <input type="button" class="operacion" value="<?= $tabla . ' * ' . ($i + 1) ?>"/>
                    <input type="button"  value="="/>
                    <input type="text"  class="operacion" name="respuesta[]" value="<?= $respuestas[$i] ?>" style="background-color: <?= $colores[$i] ?>"/>
                    <br>
                    <?php
                }
                if (!$ganado) {
                    ?>
                    <input type="submit" name="realizarIntento" value="Comprobar"/>
                    <input type="submit" name="meRindo" value="Me rindo"/>
                    <?php
                }
                ?>
                <div>
                    <a href="inicio"/>Volver</a>
                </div>
            </form>
        </div>

    </body>
</html>
