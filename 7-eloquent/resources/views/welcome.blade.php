<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            h1{
                margin-bottom: 0.30rem;
            }
        </style>
    </head>
    <body>
        <h1>Administración usuarios y pedidos</h1>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/verUsuarios">Ver todos los usuarios.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/buscadorUsuarios">Buscar usuario.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/registroUsuario">Insertar nuevo usuario.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/verPedidos">Ver todos los pedidos.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/verArticulos">Ver todos los artículos.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/buscadorPedidosUsuario">Ver pedidos de un usuario.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/verUsuariosConPedidos">Ver usuarios con pedidos realizados.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/verArticulosPedidos">Ver artículos solicitados en pedidos usando hasMany.</a><br>
        <a href="http://localhost:9090/EjemplosLaravel/7-eloquent/public/probarBelong">Probando Belong.</a><br>

    </body>
</html>
