<?php

    session_start();
    include_once("conexao.php");

    if($_SESSION['tipo'] == 0 ){
        header('location: index.php');
        exit();
    } 

    $admin = $_SESSION['id_usuario'];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Funcionários | Gerencia!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <?php
        include_once("link.php"); 
    ?>

</head>
<body>

    <?php
        include_once("menu/index.php"); 
    
        if(isset($_SESSION['mensagem'])) {
            echo $_SESSION['mensagem'];
            echo "<br><br>";
            unset($_SESSION['mensagem']);
        }
    
    ?>

    <div id="main" class="container-fluid">
        <h3 class="page-header">Funcionários:</h3>

            <div class="row">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <th style="color: #0d6f75; font-weight: 700;">#</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Visualizar</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        <thead>
                        <tbody>
                            <tr>

    <?php 

        $id_usuario = $_SESSION['id_usuario'];

        $sql = "select * from usuario where possui_id_usuario = $id_usuario and status = '1' and id_usuario <> $admin";
        $result = mysqli_query($bd, $sql);
    
        $cont = 1;

        while($usuario = mysqli_fetch_array($result)){

            echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
            echo "<td>".$usuario['nome']."</td>";
                                echo "<td>".$usuario['cpf']."</td>"; 

        ?>

                                <td>
                                <?php
                                   echo "<a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_funcionarios.php?id=".$usuario['id_usuario']."'><i class='fas fa-mouse-pointer'></i></a>";
                                ?>
                                </td>
                                <td>
                                <?php
                                   echo "<a class='btn btn-primary' id='btn_action' href='alterar_func.php?id=".$usuario['id_usuario']."'><i class='far fa-edit'></i></a>";
                                ?>
                                </td>
                                <td>
                                <?php
                                   echo "<a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='excluir_func.php?id=".$usuario['id_usuario']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='far fa-trash-alt'></i></a>";
                                ?>
                                </td>    
                                       
                            </tr>
            
        <?php
            $cont++;
        } // fecha o while
        
        ?>
   
                        </tbody>
                    </table>
                </div>
            </div>




        </div>   
        
    
    <?php
        include_once("link_fim.php"); 
    ?>
        <script src="js/personalizado.js"></script>

</body>
</html>