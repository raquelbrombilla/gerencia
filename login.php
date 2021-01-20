<?php

    session_start();
    include_once("conexao.php");

    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    if(empty($cpf) or empty($senha) ) {
        $_SESSION["mensagem"] = "<div class='message_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Campos não podem estar nulos.
        </strong></div>";
        header('location: index.php');
        exit();
    } else {

        $cpf = mysqli_real_escape_string($bd, $_POST["cpf"]);
        $senha = md5(mysqli_real_escape_string($bd, $_POST["senha"]));

        $sql = "select * from usuario where cpf = '$cpf' and senha = '$senha' ";
        $result = mysqli_query($bd, $sql);

        $usuario = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);

        if($row == 1){
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['tipo'] = $usuario['tipo'];
            header('location: viagens.php'); 
        } else {
            
            $_SESSION["mensagem"] = "<div class='message_erro'><strong>
            <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            Usuário ou senha incorretos. <br> Tente novamente.
            </strong></div>";
            header('location: index.php');
            }

    }

    mysqli_close($conexao);

?>