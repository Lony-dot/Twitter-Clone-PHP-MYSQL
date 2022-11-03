<?php

    require_once('db.class.php');

    $usuario =  $_POST['usuario'];
    $email = $_POST['email'];
    $senha =  md5($_POST['senha']);

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    //Verificar se o usuário já existe.
    //essa etapa precisa ser realizada somente após o $objDb e a coneção do banco, conecta_mysql()
    $sql = "select * from usuarios where usuario = '$usuario' ";
    if( $resultado_id = mysqli_query($link, $sql)) {

      $dados_usuario =  mysqli_fetch_array($resultado_id);

      if(isset($dados_usuario['usuario'])){
        echo 'Usuário já cadastrado';
      } else {
        echo 'Usuário não cadastrado, ok, pode cadastrar <br /><br />';
      }

    } else {
        echo 'Erro ao tentar localizar o registro do usuário <br /><br />';
    }


    //Verificar se o e-mail já existe.
    $sql = "select * from usuarios where email = '$email' ";
    if( $resultado_id = mysqli_query($link, $sql)) {

      $dados_usuario =  mysqli_fetch_array($resultado_id);

      if(isset($dados_usuario['email'])){
        echo 'E-mail já cadastrado';
      } else {
        echo 'E-mail não cadastrado, ok, pode cadastrar <br /><br />';
      }

    } else {
        echo 'Erro ao tentar localizar o registro do E-mail <br /><br />';
    }


    

    die();
    $sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

    //executar a query
   if ($result = mysqli_query($link, $sql)){
    echo 'Usuário registrado com sucesso!';
   } else {
    echo 'Erro ao registrar o usuário!';
   }

?>