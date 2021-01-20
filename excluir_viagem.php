<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_viagem = $_GET['id'];
    
    $sql = "delete from diesel where id_viagem = $id_viagem";
    $result = mysqli_query($bd, $sql);

    $sql2 = "delete from despesas where id_viagem = $id_viagem";
    $result2 = mysqli_query($bd, $sql2);

    $sql3 = "delete from viagem where id_viagem = $id_viagem";
    $result3 = mysqli_query($bd, $sql3);

    if ($result & $result2 & $result3) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Viagem excluída.
        </strong></div>";
        header('location: viagens_concluidas.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao excluir a viagem.
        </strong></div>";
        header("location: viagens_concluidas.php");
     }

     mysqli_close($bd);

    


?>
