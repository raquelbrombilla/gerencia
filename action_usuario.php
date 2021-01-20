<?php
    session_start();
    include_once("conexao.php");

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $senha = md5(mysqli_real_escape_string($bd, $senha));
    
    $sql = "insert into usuario(nome, cpf, senha, status, tipo) values('$nome', '$cpf', '$senha', '1', '1')";
    $result = mysqli_query($bd, $sql);

    if (mysqli_insert_id($bd)) {

        $sql2 = "select id_usuario from usuario order by id_usuario desc limit 1";
        $result2 = mysqli_query($bd, $sql2);

        $usuario = mysqli_fetch_array($result2);
        $id_usuario = $usuario['id_usuario'];
        
        $sql3 = "update usuario SET possui_id_usuario = $id_usuario WHERE usuario.id_usuario = $id_usuario";
        $result3 = mysqli_query($bd, $sql3);

        $_SESSION["mensagem"] = "<div class='message_ok'><strong>
        <i class='fas fa-check-circle'></i>
        Usuário cadastrado com sucesso!
        </strong></div>";
        header('location: index.php');
        exit();
        
    } else {
        $_SESSION['mensagem'] = "<div class='message_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        CPF já utilizado. Tente novamente.
        </strong></div>";
        header("location: cad_usuario.php");
     }

     mysqli_close($bd);


?>