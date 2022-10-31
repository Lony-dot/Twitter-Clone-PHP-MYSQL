<?php

    require_once('db.class.php');

    $usuario =  $_POST['usuario'];
    $email = $_POST['email'];
    $senha =  $_POST['senha'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();


    $con = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

    //executar a query
   if ($result = mysqli_query($link, $con)){
    echo 'Usuário registrado com sucesso!';
   } else {
    echo 'Erro ao registrar o usuário!';
   }

?>