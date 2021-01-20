<?php
     session_start();
     include_once("conexao.php");
 
     if( !isset($_SESSION['id_usuario']) ){
         header('location: index.php');
         exit();
     }

     $placa = $_POST['placa'];
     $marca = $_POST['marca'];
     $ano = $_POST['ano'];
     $renavam = $_POST['renavam'];
     $chassi = $_POST['chassi'];
     $antt = $_POST['antt'];
     $id_automotor = $_POST['id_automotor'];

    $sql = "UPDATE automotor SET placa = '$placa', marca = '$marca', ano = '$ano',
    renavam = '$renavam', chassi = '$chassi', antt = '$antt' where id_automotor = $id_automotor";
    $result = mysqli_query($bd, $sql);

    if($result){
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
            <i class='fas fa-check-circle'></i>
            Informações do automotor alteradas com sucesso!
            </strong></div>";
            header('location: caminhao.php');
            exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível alterar as informações do automotor.
        </strong></div>";
        header('location: caminhao.php');
    }

    mysqli_close($bd);

?>