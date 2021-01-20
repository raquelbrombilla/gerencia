<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $sql = "select * from automotor where id_cad_usuario = ". $_SESSION['id_usuario']." and status = '1' ";
    $result = mysqli_query($bd, $sql);


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
                                <th>Visualizar Conjuntos</th>
                                <th>Gerenciar Motorista</th>
                                <th>Gerenciar Carretas</th>
                            <thead>
                            <tbody>
                            <?php
                                $cont = 1;

                                while($automotor = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
                                        echo "<td>".$automotor['placa']."</td>";
                        
                                        echo "<td><a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_conjunto.php?id=".$automotor['id_automotor']."'><i class='fas fa-mouse-pointer'></i></a></td>";
                                        echo "<td><a class='btn btn-info' style='background-color: #d2238f; border: #d2238f;' id='btn_action' href='ger_motorista.php?id=".$automotor['id_automotor']."'><i class='fas fa-plus'></i></a></td>";                                        
                                        echo "<td><a class='btn btn-success' style='background-color: #e4750b;  border: #e4750b;' id='btn_action' href='ger_carreta.php?id=".$automotor['id_automotor']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='fas fa-plus'></i></a></td>";
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
  
</body>
</html>