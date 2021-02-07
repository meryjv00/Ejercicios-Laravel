<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Importamos estilos -->
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}"/>

        <!-- Importamos funciones para jquery y bootstrap -->
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
       
    </head>
    <body>

        <form action="validar" name ="fr" method="POST" id="register-form" >
            <div class="form-group">
                {!! csrf_field(); !!}
                <input type="text" class="form-control" value="" name="caja">
                <input type="submit" value="aceptar" name="aceptar" class="btn btn-info">
            </div>
        </form>
    </body>
</html>
