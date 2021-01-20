<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $dt_descarga = $_POST['dt_descarga'];
    $km_chegada = $_POST['km_chegada'];
    $valor = $_POST['valor'];
    $id_viagem = $_POST['id_viagem'];


    $sql = "UPDATE viagem SET dt_descarregamento = '$dt_descarga', km_chegada = $km_chegada, valor_frete = $valor, concluida = 1 
    WHERE id_viagem = $id_viagem";
    $result = mysqli_query($bd, $sql);

    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
        <i class='fas fa-check-circle'></i>
        Viagem concluída com sucesso!
        </strong></div>";
        header('location: viagens_concluidas.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível concluir a viagem.
        </strong></div>";
        header('location: viagens.php');
     }

    mysqli_close($bd);
    

?>