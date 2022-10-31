<?php 


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
 
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

echo $sql;
?>