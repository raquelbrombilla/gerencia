<?php
    session_start();
    include_once("conexao.php");

    $id_diesel = $_GET['id'];

    $sql2 = "select * from diesel where id_diesel = $id_diesel";
    $result2 = mysqli_query($bd, $sql2);

    $diesel = mysqli_fetch_array($result2);
    $id_viagem = $diesel['id_viagem'];
    
    $sql = "DELETE FROM diesel WHERE id_diesel = $id_diesel";
    $result = mysqli_query($bd, $sql);

    if ($result) {
        $_SESSION["mensagem"] = "<div class='mensagem_ok' style='margin-bottom: 3%;'><strong>
        <i class='fas fa-check-circle'></i>
        Despesa excluída.
        </strong></div>";

        header('location: despesas.php?id='.$id_viagem.'');
        
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro' style='margin-bottom: 3%;'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Erro ao excluir despesa.
        </strong></div>";

        header('location: despesas.php?id='.$id_viagem.'');
     }

     mysqli_close($bd);

    


?>