<?php
     session_start();
     include_once("conexao.php");
 
     if( !isset($_SESSION['id_usuario']) ){
         header('location: index.php');
         exit();
     }

    $id_viagem = $_POST['id_viagem'];      

    $sql = "select * from viagem where id_viagem = $id_viagem";
    $result = mysqli_query($bd, $sql);

    $viagem = mysqli_fetch_array($result);

    if($viagem['concluida'] == 1){

        $dt_carregamento = $_POST['dt_carregamento'];
        $dt_descarregamento = $_POST['dt_descarregamento'];
        $km_saida = $_POST['km_saida'];
        $km_chegada = $_POST['km_chegada'];
        $local_carregamento = $_POST['local_carregamento'];
        $destino = $_POST['destino'];
        $valor_frete = $_POST['valor_frete'];

        $sql2 = "UPDATE viagem SET dt_carregamento = '$dt_carregamento', dt_descarregamento = '$dt_descarregamento', km_saida = '$km_saida', km_chegada = $km_chegada, 
        local_carregamento = '$local_carregamento', destino = '$destino', valor_frete = '$valor_frete' WHERE id_viagem = $id_viagem";
        $result2 = mysqli_query($bd, $sql2);

        if ($result2) {
            $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
            <i class='fas fa-check-circle'></i>
            Viagem alterada com sucesso!
            </strong></div>";
            header('location: viagens_concluidas.php');
            exit();
        } else {
            $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
            <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            Não foi possível alterar a viagem.
            </strong></div>";
            header('location: viagens_concluidas.php');
         }

    } else if($viagem['concluida'] == 0){

        $dt_carregamento = $_POST['dt_carregamento'];
        $km_saida = $_POST['km_saida'];
        $local_carregamento = $_POST['local_carregamento'];
        $destino = $_POST['destino'];

        $sql2 = "UPDATE viagem SET dt_carregamento = '$dt_carregamento', km_saida = '$km_saida', local_carregamento = '$local_carregamento', 
        destino = '$destino' WHERE id_viagem = $id_viagem";
        $result2 = mysqli_query($bd, $sql2);

        if ($result2) {
            $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
            <i class='fas fa-check-circle'></i>
            Viagem alterada com sucesso!
            </strong></div>";
            header('location: viagens.php');
            exit();
        } else {
            $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
            <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            oi
            </strong></div>";
            header('location: viagens.php');
         }

    }


    mysqli_close($bd);

?>