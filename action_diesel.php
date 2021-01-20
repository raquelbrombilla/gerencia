<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit(); 
    }

    $data = $_POST['data'];
    $km = $_POST['km'];
    $posto = $_POST['posto'];
    $litros = $_POST['litros'];
    $valor = $_POST['valor'];
    $id_viagem = $_POST['id_viagem'];

    $sql = "insert into diesel(posto, data, km, litros, valor, id_viagem) values('$posto', '$data', '$km', '$litros', '$valor','$id_viagem')";
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