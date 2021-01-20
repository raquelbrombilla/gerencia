<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_usuario = $_GET['id'];
    
    $sql = "update usuario set status = '0' where id_usuario = $id_usuario";
    $result = mysqli_query($bd, $sql);

    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Funcionário excluído.
        </strong></div>";
        header('location: funcionarios.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao excluir funcionário.
        </strong></div>";
        header("location: funcionarios.php");
     }

     mysqli_close($bd);

    


?>