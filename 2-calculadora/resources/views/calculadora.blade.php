<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            div{
                background-color: #fbf1c7;
                margin-top: 5rem;
                width: 30%;
                margin-left: auto;
                margin-right: auto;
                border: 1px solid;
                padding-left: 6rem;
            }
        </style>
    </head>
    <body>
        <?php
        //session()->flush();
        if(!isset($numero1)){
            $numero1 = "";
        }
        if(!isset($numero2)){
            $numero2 = "";
        }
        if(!isset($rdo)){
            $rdo = "";
        }
        ?>
        <div>
            <h1>Calculadora básica</h1>
            <form name="formulario" method="POST" action="calcular">
                {{ csrf_field() }} 
                Número 1: <input type="number" name="numero1" value="<?= $numero1 ?>"/>
                <input type="submit" value="MS" name="memory"/><br>

                Número 2: <input type="number" name="numero2" value="<?= $numero2 ?>"/>
                <input type="submit" value="MG" name="memory"/><br>

                Resultado: <input readonly type="number" name="resultado" value="<?= $rdo ?>"/><br>
                <p>
                    <input type="submit" value="+" name="operacion"/>
                    <input type="submit" value="-" name="operacion"/>
                    <input type="submit" value="*" name="operacion"/>
                    <input type="submit" value="/" name="operacion"/>
                </p>
            </form>
        </div>
    </body>
</html>
