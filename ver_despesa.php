<?php
    session_start();
    include_once("conexao.php");

    $id_despesa = $_GET['id'];

    $sql = "select * from despesas where id_despesa = $id_despesa";
    $result = mysqli_query($bd, $sql);

    $despesa = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> Despesas | Gerencia!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <?php
        include_once("link.php"); 
    ?>

</head>
<body>

    <?php
        include_once("menu/index.php"); 
    ?>
        
    <div class="container"> 
        <div class="titulo_form">Dados da despesa:</div>
            <div class="caixa_form">              
                
      
                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Data </label>
                                    <?php
                                    echo "<input type='date' value=".$despesa['data']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                    ?>
                            </div>
                                
                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label class='label_cad'> Estabelecimento </label>
                                    <?php
                                    echo "<input type='text' value=".$despesa['estabelecimento']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                    ?>                            
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Descrição </label>
                                <?php
                                    echo "<input type='text' value=".$despesa['descricao']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                ?>                             
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Valor </label>
                                <?php
                                    echo "<input type='number' value=".$despesa['valor']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                ?>                             
                            </div>
                        </div>
                      
            </div>
        </div>
        <?php
        include_once("link_fim.php"); 
    ?>
  
</body>
</html>