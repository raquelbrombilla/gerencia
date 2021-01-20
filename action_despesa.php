<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit(); 
    }

    $data = $_POST['data'];
    $estabelecimento = $_POST['estabelecimento'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $id_viagem = $_POST['id_viagem'];

    $sql = "insert into despesas(data, estabelecimento, descricao, valor, id_viagem) values('$data', '$estabelecimento', '$descricao', '$valor','$id_viagem')";
    $result = mysqli_query($bd, $sql);

    if (mysqli_insert_id($bd)) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
        <i class='fas fa-check-circle'></i>
        Dados da despesa cadastrados com sucesso!
        </strong></div>";
        header('location: despesas.php?id='.$id_viagem.'');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível cadastrar os dados da despesa.
        </strong></div>";
        header('location: despesas.php?id='.$id_viagem.'');
     }

    mysqli_close($bd);


?>