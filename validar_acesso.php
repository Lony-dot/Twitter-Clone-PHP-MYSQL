<?php 


require_once('db.class.php');


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
 
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";


$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
    
    $dados_usuario = mysqli_fetch_array($resultado_id);  //referência para uma informação externa para o PHP

    if(isset($dados_usuario['usuario'])) { //testando o indice "usuario" do dado $dados_usuario que é um array contendo o retorno da consulta com o banco de dados.
        echo 'Usuário existe';
    } else {
        header('Location: index.php?erro=1 '); //encaminhamento de parâmetros via URL
    }

} else {
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}



?>