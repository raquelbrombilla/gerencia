<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_carreta = $_GET['id'];

    $sql = "select * from carreta where id_carreta = $id_carreta";
    $result = mysqli_query($bd, $sql);
    $automotor = mysqli_fetch_array($result);
    $id_automotor = $automotor['id_automotor'];
    
    $sql2 = "UPDATE carreta SET id_automotor = NULL WHERE id_carreta = $id_carreta";
    $result2 = mysqli_query($bd, $sql2);

  
    if ($result2) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Carreta desvinculada.
        </strong></div>";
        header('location: ver_conjunto.php?id='.$id_automotor.'');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao desvincular carreta.
        </strong></div>";
        header('location: ver_conjunto.php?id='.$id_automotor.'');
     }

     mysqli_close($bd);

?>