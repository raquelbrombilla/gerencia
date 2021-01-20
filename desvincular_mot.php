<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_automotor = $_GET['id'];
    
    $sql = "UPDATE automotor SET id_dirige_usuario = NULL WHERE id_automotor = $id_automotor";
    $result = mysqli_query($bd, $sql);

  
    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Motorista desvinculado.
        </strong></div>";
        header('location: ver_conjunto.php?id='.$id_automotor.'');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao desvincular motorista.
        </strong></div>";
        header('location: ver_conjunto.php?id='.$id_automotor.'');
     }

     mysqli_close($bd);

?>