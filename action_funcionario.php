<?php

    session_start();
    include_once("conexao.php");

    if($_SESSION['tipo'] == 0 ){
        header('location: index.php');
        exit();
    } 

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dt_admissao = $_POST['data'];
    $senha = $_POST['senha'];

    $senha = md5(mysqli_real_escape_string($bd, $senha));

    $admin = $_SESSION['id_usuario'];

    $sql = "insert into usuario(nome, cpf, dt_admissao, senha, status, tipo, possui_id_usuario) values('$nome', '$cpf', '$dt_admissao', '$senha', '1', '0', '$admin')";
    $result = mysqli_query($bd, $sql);

    if (mysqli_insert_id($bd)) {
        
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
        <i class='fas fa-check-circle'></i>
        Funcionário cadastrado com sucesso!
        </strong></div>";
        header('location: cad_funcionario.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        CPF já utilizado. Tente novamente.
        </strong></div>";
        header("location: cad_funcionario.php");
     }
     
    mysqli_close($bd);
    
?>