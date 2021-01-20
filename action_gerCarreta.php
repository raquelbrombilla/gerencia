<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_automotor = $_POST['id_automotor'];

    if($_POST['optcheck']){
        $conn = count($_POST['optcheck']);
        $x = 1;

        foreach($_POST['optcheck'] as $id_carreta){
            
            $sql = "UPDATE carreta SET id_automotor = $id_automotor WHERE id_carreta = $id_carreta";
            $result = mysqli_query($bd, $sql);

            if($result){
                $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
                    <i class='fas fa-check-circle'></i>
                    Carreta(s) vinculada(s) com sucesso!
                    </strong></div>";
                    header('location: ger_carreta.php?id='.$id_automotor.'');
                    exit();
            } else {
                $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
                <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                Não foi possível vincular a(s) carreta(s) ao automotor.
                </strong></div>";
                header('location: ger_carreta.php?id='.$id_automotor.'');
            }

        }
    } else{
        echo "deu erro";
    }

    
    mysqli_close($bd);

?>