<?php
//Servidor local (XAMPP)

$server = "localhost";
$user = "root";
$senha = "";
$banco = "gerencia";

 $bd = mysqli_connect($server, $user, $senha, $banco);

 if(!$bd){
    echo "Não foi possível conectar o BD". PHP_EOL;;
    echo "Mensagem de erro: ".mysqli_connect_error().PHP_EOL;;
    exit();
 }

?>