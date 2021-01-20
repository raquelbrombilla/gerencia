<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_usuario = $_POST['optradio'];
    $id_automotor = $_POST['id_automotor'];

    $sql = "SELECT id_dirige_usuario FROM automotor WHERE id_automotor = $id_automotor 
    AND id_dirige_usuario is not NULL";
    $result = mysqli_query($bd, $sql);

    $conn = mysqli_num_rows($result);

    echo $conn;


    if(mysqli_num_rows($result) > 0){
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Esse automotor já possui um motorista vinculado. Primeiro, desvincule-o.
        </strong></div>";
        header('location: ger_motorista.php?id='.$id_automotor.'');
        exit();

    } else {

        $sql2 = "UPDATE automotor SET id_dirige_usuario = $id_usuario WHERE id_automotor = $id_automotor";
        $result2 = mysqli_query($bd, $sql2);

        if($result2){
            $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
                <i class='fas fa-check-circle'></i>
                Motorista vinculado com sucesso!
                </strong></div>";
                header('location: ger_motorista.php?id='.$id_automotor.'');
                exit();
        } else {
            $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
            <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            Não foi possível vincular o motorista ao automotor.
            </strong></div>";
            header('location: ger_motorista.php?id='.$id_automotor.'');
        }

    }

    

mysqli_close($bd);

?>