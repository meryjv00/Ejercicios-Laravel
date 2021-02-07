<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
        <style>
            body{
                background-color: #4f424c;
            }
            div{
                width: 35rem;
                margin: auto;
                margin-top: 5rem;
                padding-bottom: 1.40rem;
                text-align: center;
                border: 2px solid;
                background-color: antiquewhite;
            }
            input{
                margin-left: 1rem;
            }
            hr{
                margin-top: 1em;
                width: 20rem;
                border: 1px solid;
                color: #4f424c;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Conjuntos</h1>
            <p>Elige el conjunto que quieras administrar:</p>
            <form name="formulario" method="POST" action="elegirConjunto">
                {{ csrf_field() }} 
                <select name="conjuntos">
                    <?php
                    foreach ($conjuntos as $i => $conjunto) {
                        ?>
                        <option value="<?= $i ?>"><?= $conjunto->getNombre() ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Elegir" name="elegir"/><br>
            </form>
            <hr>
            <!--***********************************************-->
            <p>Ver:</p>
            <form name="forumulario" method="POST" action="unionInterseccion">
                {{ csrf_field() }} 
                <input type="submit" value="Ver unión" name="union"/>
                <input type="submit" value="Ver intersección" name="interseccion"/>
            </form>
        </div>
    </body>
</html>
