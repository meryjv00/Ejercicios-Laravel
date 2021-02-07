<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Conjunto</title>
        <style>
            body{
                background-color: #4f424c;
            }
            div.conjunto{
                width: 35rem;
                margin: auto;
                margin-top: 5rem;
                padding-bottom: 1.40rem;
                text-align: center;
                border: 2px solid;
                background-color: antiquewhite;
            }
            .volver{
                margin-top: 10px;
            }
            hr{
                margin-top: 1em;
                width: 20rem;
                border: 1px solid;
                color: #4f424c;
            }
            input{
                margin-top: 0.50em;
            }
        </style>
    </head>
    <body>
        <div class="conjunto">
            <h1><?= $conjuntoSeleccionado->getNombre() ?></h1>
            <form name="formu" method="POST" action="addElemento">
                {{ csrf_field() }} 
                <div>
                    <p>Añade nuevo elemento:</p>
                    <input type="number" name="elemento" required/>
                    <input type="submit" name="addElemento" value="Añadir elemento"/>
                    <hr>
                </div>
            </form>
            <form name="formu" method="POST" action="deleteElemento">
                {{ csrf_field() }}
                <p>Elementos:</p>
                <?php
                if ($conjuntoSeleccionado->size() > 0) {
                    for ($i = 0; $i < $conjuntoSeleccionado->size(); $i++) {
                        ?>
                        <input type="button" value="<?= $conjuntoSeleccionado->getElemento($i) ?>"/>
                        <input type="submit" name="<?= $i ?>" value="Borrar"/>
                        <br>
                        <?php
                    }
                } else {
                    echo 'No hay elementos en el conjunto';
                }
                ?>
            </form>

            <form name="formu" method="POST" class="volver" action="volverInicio">
                {{ csrf_field() }} 
                <input type="submit" name="volver" value="Volver"/>
            </form>
        </div>
    </body>
</html>
