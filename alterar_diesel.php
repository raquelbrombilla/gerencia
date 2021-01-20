<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $id_diesel = $_GET['id'];
    $sql = "select * from diesel where id_diesel = $id_diesel";
    $result = mysqli_query($bd, $sql);

    $diesel = mysqli_fetch_array($result);
    
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Alterar despesa com diesel | Gerencia!</title>
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
        <div class="titulo_form">Alterar Despesa com Diesel:</div>
            <div class="caixa_form">
                <form action="action_altDiesel.php" method="POST">

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
                  echo "<input type='hidden' id='id_diesel' name='id_diesel' value=".$diesel['id_diesel'].">";
                ?>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="data" class="label_cad"> Data </label>
                            <?php
                                echo "<input type='date' id='data' name='data' value='".$diesel['data']."' class='input_cadastro'>";
                            ?>  
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="km" class="label_cad"> Km </label>
                            <?php
                                echo "<input type='number' id='km' name='km' value='".$diesel['km']."' class='input_cadastro'>";
                            ?> 
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="posto" class="label_cad"> Posto </label>
                            <?php
                                echo "<input type='text' id='posto' name='posto' value='".$diesel['posto']."' class='input_cadastro'>";
                            ?> 
                        </div>
                    </div>
                    
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="litros" class="label_cad"> Litros </label>
                            <?php
                                echo "<input type='number' id='litros' name='litros' value='".$diesel['litros']."' class='input_cadastro'>";
                            ?> 
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="valor" class="label_cad"> Valor </label>
                            <?php
                                echo "<input type='number' id='valor' name='valor' value='".$diesel['valor']."' class='input_cadastro'>";
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