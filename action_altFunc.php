<?php
     session_start();
     include_once("conexao.php");
 
     if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

     $nome = $_POST['nome'];
     $cpf = $_POST['cpf'];
     $cnh = $_POST['cnh'];
     $dt_admissao = $_POST['dt_admissao'];
     $dt_nasc = $_POST['dt_nasc'];
     $endereco = $_POST['endereco'];
     $telefone = $_POST['telefone'];
     $id_usuario = $_POST['id_usuario'];

    $sql = "UPDATE usuario SET nome = '$nome', cpf = '$cpf', cnh = '$cnh', dt_admissao = '$dt_admissao', 
    dt_nasc = '$dt_nasc', endereco = '$endereco', telefone = '$telefone' where id_usuario = $id_usuario";
    $result = mysqli_query($bd, $sql);

    if($result){
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
            <i class='fas fa-check-circle'></i>
            Informações alteradas com sucesso!
            </strong></div>";
            header('location: funcionarios.php');
            exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível alterar as informações.
        </strong></div>";
        header('location: funcionarios.php');
    }

    mysqli_close($bd);

?>