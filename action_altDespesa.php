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
     $id_despesa = $_POST['id_despesa'];
     

    $sql = "UPDATE despesas SET data = '$data', estabelecimento = '$estabelecimento', descricao = '$descricao',
    valor = '$valor' where id_despesa = $id_despesa";
    $result = mysqli_query($bd, $sql);

    if($result){
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
            <i class='fas fa-check-circle'></i>
            Informações alteradas com sucesso!
            </strong></div>";
            header('location: alterar_despesa.php?id='.$id_despesa.'');
            exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível alterar as informações.
        </strong></div>";
        header('location: alterar_despesa.php?id='.$id_despesa.'');
    }

    mysqli_close($bd);

?>