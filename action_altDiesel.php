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
     $id_diesel = $_POST['id_diesel'];
     

    $sql = "UPDATE diesel SET data = '$data', km = '$km', posto = '$posto', litros = '$litros', 
    valor = '$valor' where id_diesel = $id_diesel";
    $result = mysqli_query($bd, $sql);

    if($result){
        $_SESSION["mensagem"] = "<div class='mensagem_ok'><strong>
            <i class='fas fa-check-circle'></i>
            Informações alteradas com sucesso!
            </strong></div>";
            header('location: alterar_diesel.php?id='.$id_diesel.'');
            exit();
    } else {
        $_SESSION['mensagem'] = "<div class='mensagem_erro'><strong>
        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Não foi possível alterar as informações.
        </strong></div>";
        header('location: alterar_diesel.php?id='.$id_diesel.'');
    }

    mysqli_close($bd);

?>