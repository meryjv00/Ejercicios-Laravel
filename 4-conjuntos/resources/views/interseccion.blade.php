<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intersección conjuntos</title>
        <style>
            body{
                background-color: #4f424c;
            }
            div.conjunto{
                width: 50rem;
                margin: auto;
                margin-top: 5rem;
                padding-bottom: 1.40rem;
                text-align: center;
                border: 2px solid;
                background-color: antiquewhite;
            }
            div.circulo {
                width: 30rem;
                height: 30rem;
                margin: auto;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
                background: #4f424c;
                align-items: center;
                justify-content: center;
                display: flex;
            }
            div.elemento{
                font-size: 1.50rem;
                border: 1px solid black;
                padding: 0.50rem;
                margin: 0.50rem;
            }
            .volver{
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="conjunto">
            <h1>Intersección conjuntos</h1>
            <div class="circulo">
                <?php
                foreach ($interseccionConjuntos as $i => $elemento) {
                    ?>
                    <div class="elemento"><?= $elemento ?></div>
                    <?php
                }
                ?>
            </div>
            <form name="formu" method="POST" class="volver" action="volverInicio">
                {{ csrf_field() }} 
                <input type="submit" name="volver" value="Volver"/>
            </form>
        </div>
    </body>
</html>
