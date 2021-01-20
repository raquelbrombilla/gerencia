<?php
    session_start();
    include_once("conexao.php");

    $id_viagem = $_POST['id_viagem'];      

    $sql = "select v.id_viagem, di.* from viagem v, diesel di where v.id_viagem = $id_viagem and v.id_viagem = di.id_viagem";
    $result = mysqli_query($bd, $sql);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Diesel | Gerencia!</title>
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
        <h3 class="page-header">Despesas com Diesel:</h3>

        <div class="row">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <th style="color: #0d6f75; font-weight: 700;">#</th>
                            <th>Data</th>
                            <th>Km</th>
                            <th>Posto</th>
                            <th>Litros</th>
                            <th>Valor</th>
                            <th>Visualizar</th>
                            <th>Alterar</th>
                            <?php
                            if($_SESSION['tipo'] == 1){
                                echo "<th>Excluir</th>";
                            }
                            ?>
                        <thead>
                        <tbody>
                            
                                <?php
                                    
                                    $cont = 1;

                                    while($diesel = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
                                        echo "<td>".date('d/m/Y', strtotime($diesel['data']))."</td>";   
                                        echo "<td>".$diesel['km']."</td>"; 
                                        echo "<td>".$diesel['posto']."</td>";   
                                        echo "<td>".$diesel['litros']."</td>"; 
                                        echo "<td>".$diesel['valor']."</td>";    
                                        echo "<td><a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_diesel.php?id=".$diesel['id_diesel']."'><i class='fas fa-mouse-pointer'></i></a></td>";
                                        echo "<td><a class='btn btn-primary' id='btn_action' href='#'><i class='fas fa-edit'></i></a></td>";
                                        
                                        if($_SESSION['tipo'] == 1){
                                            echo "<td><a class='btn btn-danger' id='btn_action' href='#'><i class='far fa-trash-alt'></i></a></td>";
                                        }
                                    
                                        echo "</tr>";
                                        $cont++;
                                    }
                                
                                ?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="cad_diesel.php" method="POST">
                
                <?php

                    echo "<input type='hidden' id='id_viagem' name='id_viagem' value=".$id_viagem.">";
                ?>
                
                <div class="d-flex justify-content-center">
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                            <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button class='botao_cad'>ADICIONAR</button>
                            </div>
                    </div>
                </div>
            </form>
    </div>
      
    <?php
        include_once("link_fim.php"); 
    ?>

  
</body>
</html>