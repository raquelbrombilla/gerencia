<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $dt_carregamento = $_POST['dt_carregamento'];
    $km_saida = $_POST['km_saida'];
    $local_carreg = $_POST['local_carreg'];
    $destino = $_POST['destino'];

    $id_usuario = $_SESSION['id_usuario'];

    $sql2 = "select id_dirige_usuario from automotor where id_dirige_usuario = $id_usuario";
    $result2 = mysqli_query($bd, $sql2);

    if(mysqli_num_rows($result2) < 1){
        $_SESSION["mensagem"] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle'></i>
        Você só pode cadastrar uma viagem se estiver vinculado a um automotor.
        </strong></div>";
        header('location: cad_viagens.php');
        exit();
    }

    $sql = "insert into viagem(dt_carregamento, local_carregamento, km_saida, destino, concluida, id_usuario) values('$dt_carregamento', '$local_carreg', '$km_saida', '$destino', '0', '$id_usuario')";
    $result = mysqli_query($bd, $sql);

    if (mysqli_insert_id($bd)) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
        <i class='fas fa-check-circle'></i>
        Dados da viagem cadastrados com sucesso!
        </strong></div>";
        header('location: cad_viagens.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível cadastrar os dados da viagem.
        </strong></div>";
        header('location: cad_viagens.php');
     }

    mysqli_close($bd);


?>