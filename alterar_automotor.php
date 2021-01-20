<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_automotor = $_GET['id'];

    $sql = "select * from automotor where id_automotor = $id_automotor";
    $result = mysqli_query($bd, $sql);

    $automotor = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Alterar automotor | Gerencia!</title>
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
        <div class="titulo_form">Alterar Automotor:</div>
            <div class="caixa_form">
                <form action="action_altAutomotor.php" method="POST">

                <div class ="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="float: left; margin-top: 2%;">
                            <?php
                                if(isset($_SESSION['mensagem'])) {
                                    echo $_SESSION['mensagem'];
                                    unset($_SESSION['mensagem']);
                                }
                            ?>
                        </div>
                    </div>

                <?php
                  echo "<input type='hidden' id='id_automotor' name='id_automotor' value=".$automotor['id_automotor'].">";
                ?>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="placa" class="label_cad"> Placa </label>
                            <?php
                                echo "<input type='text' id='placa' name='placa' value=".$automotor['placa']." class='input_cadastro'>";
                            ?>
                        </div>
                        
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="marca" class="label_cad"> Marca/Modelo </label>
                            <?php
                                echo "<input type='text' id='marca' name='marca' value=".$automotor['marca']." class='input_cadastro'>";
                            ?>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <label for="ano" class="label_cad"> Data de fabricação </label>
                        <?php
                            echo "<input type='date' id='ano' name='ano' value=".$automotor['ano']." class='input_cadastro'>";
                        ?>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="renavam" class="label_cad"> Renavam </label>
                            <?php
                                echo "<input type='text' id='renavam' name='renavam' value=".$automotor['renavam']." class='input_cadastro'>";
                            ?>
                        </div>
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="chassi" class="label_cad"> Chassi</label>
                            <?php
                                echo "<input type='text' id='chassi' name='chassi' value=".$automotor['chassi']." class='input_cadastro'>";
                            ?>
                        </div>
                    </div>
                   
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="antt" class="label_cad"> ANTT</label>
                            <?php
                                echo "<input type='text' id='antt' name='antt' value=".$automotor['antt']." class='input_cadastro'>";
                            ?>
                        </div>
                    </div>
                    
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button class="botao_cad">ALTERAR</button>
                        </div>
                    </div>
                   

                </form>          
            </div>  <!-- caixa form -->
    </div> <!-- container -->
    
    
    <?php
        include_once("link_fim.php"); 
    ?>


</body>
</html>