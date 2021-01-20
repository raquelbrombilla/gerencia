<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_carreta = $_GET['id'];

    $sql = "select * from carreta where id_carreta = $id_carreta";
    $result = mysqli_query($bd, $sql);

    $carreta = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> Carreta | Gerencia!</title>
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
        <div class="titulo_form">Dados da carreta:</div>
            <div class="caixa_form">    

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="placa" class="label_cad"> Placa </label>
                            <?php
                                echo "<input type='text' id='placa' name='placa' value=".$carreta['placa']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                            ?>
                        </div>
                        
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="marca" class="label_cad"> Marca/Modelo </label>
                            <?php
                                echo "<input type='text' id='marca' name='marca' value=".$carreta['marca']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                            ?>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <label for="ano" class="label_cad"> Data de fabricação </label>
                        <?php
                            echo "<input type='date' id='ano' name='ano' value=".$carreta['ano']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                        ?>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="renavam" class="label_cad"> Renavam </label>
                            <?php
                                echo "<input type='text' id='renavam' name='renavam' value=".$carreta['renavam']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                            ?>
                        </div>
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="chassi" class="label_cad"> Chassi</label>
                            <?php
                                echo "<input type='text' id='chassi' name='chassi' value=".$carreta['chassi']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                            ?>
                        </div>
                    </div>
                   
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="antt" class="label_cad"> ANTT</label>
                            <?php
                                echo "<input type='text' id='antt' name='antt' value=".$carreta['antt']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
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