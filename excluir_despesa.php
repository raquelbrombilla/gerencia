<?php
    session_start();
    include_once("conexao.php");

    $id_despesa = $_GET['id'];

    $sql2 = "select * from despesas where id_despesa = $id_despesa";
    $result2 = mysqli_query($bd, $sql2);

    $despesa = mysqli_fetch_array($result2);
    $id_viagem = $despesa['id_viagem'];
    
    $sql = "DELETE FROM despesas WHERE id_despesa = $id_despesa";
    $result = mysqli_query($bd, $sql);

    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Despesa excluída.
        </strong></div>";
        header('location: despesas.php?id='.$id_viagem.'');
        exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao excluir despesa.
        </strong></div>";
        header('location: despesas.php?id='.$id_viagem.'');
     }

     mysqli_close($bd);

    


?>