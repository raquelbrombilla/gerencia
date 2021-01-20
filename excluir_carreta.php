<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_carreta = $_GET['id'];

    $sql = "DELETE FROM carreta WHERE id_carreta = $id_carreta";
    $result = mysqli_query($bd, $sql);

    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Carreta excluída.
        </strong></div>";
        header('location: caminhao.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao excluir carreta.
        </strong></div>";
        header('location: caminhao.php');
     }

     mysqli_close($bd);

?>