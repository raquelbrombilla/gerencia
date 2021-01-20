<?php
    session_start();
    include_once("conexao.php"); 

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $id_viagem = $_GET['id'];     

    $sql = "select v.id_viagem, di.* from viagem v, diesel di where v.id_viagem = $id_viagem and v.id_viagem = di.id_viagem";
    $result = mysqli_query($bd, $sql);

    $sql2 = "select v.id_viagem, de.* from viagem v, despesas de where v.id_viagem = $id_viagem and v.id_viagem = de.id_viagem";
    $result2 = mysqli_query($bd, $sql2);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Despesas | Gerencia!</title>
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
                                        echo "<td><a class='btn btn-primary' id='btn_action' href='alterar_diesel.php?id=".$diesel['id_diesel']."'><i class='fas fa-edit'></i></a></td>";                                        
                                        if($_SESSION['tipo'] == 1){
                                            echo "<td><a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='excluir_diesel.php?id=".$diesel['id_diesel']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='far fa-trash-alt'></i></a>";
                                        }
                                    
                                        echo "</tr>";
                                        $cont++;
                                    }
                                
                                ?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="d-flex justify-content-center">
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                            <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php
                            echo "<td><a class='btn' id='botao' href='cad_diesel.php?id=".$id_viagem."'>ADICIONAR</a></td>";
                            ?>
                            </div>
                    </div>
                </div>  
               
    <br>
    <br>
    
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

                                    while($despesa = mysqli_fetch_array($result2)){
                                        echo "<tr>";    
                                        echo "<td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>";
                                        echo "<td>".date('d/m/Y', strtotime($despesa['data']))."</td>";   
                                        echo "<td>".$despesa['descricao']."</td>"; 
                                        echo "<td>".$despesa['estabelecimento']."</td>";   
                                        echo "<td>".$despesa['valor']."</td>";    
                                        echo "<td><a class='btn btn-info' style='background-color: #5a95d4; border: #5a95d4;' id='btn_action' href='ver_despesa.php?id=".$despesa['id_despesa']."'><i class='fas fa-mouse-pointer'></i></a></td>";
                                        echo "<td><a class='btn btn-primary' id='btn_action' href='alterar_despesa.php?id=".$despesa['id_despesa']."'><i class='fas fa-edit'></i></a></td>";                                        

                                        if($_SESSION['tipo'] == 1){
                                            
                                            echo "<td><a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='excluir_despesa.php?id=".$despesa['id_despesa']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='far fa-trash-alt'></i></a>";
                                        }
                                    
                                        echo "</tr>";
                                        $cont++;
                                    }
                                
                                ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                            <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php
                            echo "<td><a class='btn' id='botao' href='cad_despesa.php?id=".$id_viagem."'>ADICIONAR</a></td>";
                            ?>
                            </div>
                    </div>
                </div>
            </form>

    </div>
   
   
      
    <?php
        include_once("link_fim.php"); 

    ?>

<script src="js/personalizado.js"></script>


  
</body>
</html>