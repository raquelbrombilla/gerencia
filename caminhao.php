<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }
    $sql = "select * from automotor where status = 1 and id_cad_usuario = ". $_SESSION['id_usuario'];
    $result = mysqli_query($bd, $sql);

    $sql2 = "select * from carreta where id_cad_usuario = ".$_SESSION['id_usuario'];
    $result2 = mysqli_query($bd, $sql2);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Caminhões | Gerencia!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <?php
        include_once("link.php"); 
    ?>


</head>
<body>

    <?php
        include_once("menu/index.php"); 
    ?>

    <div id="main" class="container-fluid">
                <div class ="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="float: left; margin-top: 2%;">
                        <?php
                            if(isset($_SESSION['mensagem'])) {
                                echo $_SESSION['mensagem'];
                                echo "<br><br>";
                                unset($_SESSION['mensagem']);
                            }
                        ?>
                    </div>
                </div>

                <h3 class="page-header">Automotores:</h3>

                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <th style="color: #0d6f75; font-weight: 700;">#</th>
                                <th>Placa</th>
                                <th>Visualizar</th>
                                <th>Alterar</th>
                                <th>Excluir</th>
                            <thead>
                            <tbody>
                            <?php
                                $cont = 1;

                                while($automotor = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
                                        echo "<td>".$automotor['placa']."</td>"; 
                                        echo "<td><a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_automotor.php?id=".$automotor['id_automotor']."'><i class='fas fa-mouse-pointer'></i></a></td>";
                                        echo "<td><a class='btn btn-primary' id='btn_action' href='alterar_automotor.php?id=".$automotor['id_automotor']."'><i class='fas fa-edit'></i></a></td>";                                        
                                        echo "<td><a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='excluir_automotor.php?id=".$automotor['id_automotor']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='far fa-trash-alt'></i></a>";
                                        $cont++;
                                    }
                                echo "</tr>";
                                
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

    <br>
    <br>

    <h3 class="page-header">Carretas:</h3>

        <div class="row">
            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <th style="color: #0d6f75; font-weight: 700;">#</th>
                        <th>Placa</th>
                        <th>Visualizar</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    <thead> 
                    <tbody>
                    <?php
                        $cont = 1;

                        while($carreta = mysqli_fetch_array($result2)){
                                echo "<tr>";
                                echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
                                echo "<td>".$carreta['placa']."</td>"; 
                                echo "<td><a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_carreta.php?id=".$carreta['id_carreta']."'><i class='fas fa-mouse-pointer'></i></a></td>";
                                echo "<td><a class='btn btn-primary' id='btn_action' href='alterar_carreta.php?id=".$carreta['id_carreta']."'><i class='fas fa-edit'></i></a></td>";                                        
                                echo "<td><a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='excluir_carreta.php?id=".$carreta['id_carreta']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='far fa-trash-alt'></i></a>";
                                $cont++;
                        }
                        echo "</tr>";
                        
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