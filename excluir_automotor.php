<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_automotor = $_GET['id'];
    
    $sql = "UPDATE automotor SET status = '0', id_dirige_usuario = NULL WHERE id_automotor = $id_automotor";
    $result = mysqli_query($bd, $sql);

    $array = mysqli_fetch_array($result);

    if($array['status'] == 0){
        $sql2 = "UPDATE carreta SET id_automotor = NULL where id_automotor = $id_automotor";
        $result2 = mysqli_query($bd, $sql2);
    }
  
    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Automotor excluído.
        </strong></div>";
        header('location: caminhao.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao excluir automotor.
        </strong></div>";
        header('location: caminhao.php');
     }

     mysqli_close($bd);

    


?>