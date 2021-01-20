<?php
    session_start();
    include_once("conexao.php");

    $id_viagem = $_POST['id_viagem'];      

    $sql = "select v.id_viagem, de.* from viagem v, despesas de where v.id_viagem = $id_viagem and v.id_viagem = de.id_viagem";
    $result = mysqli_query($bd, $sql);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Outras despesas | Gerencia!</title>
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
        <h3 class="page-header">Outras despesas:</h3>

        <div class="row">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <th style="color: #0d6f75; font-weight: 700;">#</th>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Estabelecimento</th>
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

                                    while($despesa = mysqli_fetch_array($result)){
                                        echo "<tr>";    
                                        echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
                                        echo "<td>".date('d/m/Y', strtotime($despesa['data']))."</td>";   
                                        echo "<td>".$despesa['descricao']."</td>"; 
                                        echo "<td>".$despesa['estabelecimento']."</td>";   
                                        echo "<td>".$despesa['valor']."</td>";    
                                        echo "<td><a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_despesa.php?id=".$despesa['id_despesa']."'><i class='fas fa-mouse-pointer'></i></a></td>";
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

    </div>
      
    <?php
        include_once("link_fim.php"); 
    ?>

  
</body>
</html>