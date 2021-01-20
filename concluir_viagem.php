<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $id_viagem = $_GET['id'];

    $sql = "select * from viagem where id_viagem = $id_viagem";
    $result = mysqli_query($bd, $sql);

    $viagem = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Concluir Viagens | Gerencia!</title>
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
        <div class="titulo_form">Concluir Viagem:</div>
            <div class="caixa_form">
                <form action="action_concluir.php" method="POST">
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

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="dt_carregamento" class="label_cad"> Data de carregamento </label>
                        <?php
                            echo "<input type='date' value=".$viagem['dt_carregamento']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                        ?>    
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="km_saida" class="label_cad"> Km saída </label>
                            <?php
                                echo "<input type='number' value='".$viagem['km_saida']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                            ?>    
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="local_carreg" class="label_cad"> Local de carregamento </label>
                            <?php
                                echo "<input type='text' value='".$viagem['local_carregamento']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                            ?>    
                        </div>
                    </div>
                    
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <label for="destino" class="label_cad"> Destino da carga </label>
                        <?php
                            echo "<input type='text' value='".$viagem['destino']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                        ?> 
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="dt_descarga" class="label_cad"> Data de descarregamento </label>
                        <?php
                            echo "<input type='date' id='dt_descarga' name='dt_descarga' value='".date("d/m/Y")."' class='input_cadastro'>";
                        ?>
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="km_chegada" class="label_cad"> Km chegada </label>
                            <input type="number" id="km_chegada" name="km_chegada" placeholder="Informe sua quilometragem final." class="input_cadastro">
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="valor" class="label_cad"> Valor do frete </label>
                            <input type="number" id="valor" name="valor" placeholder="Informe o valor total de frete." class="input_cadastro">
                        </div>
                    </div>
                    <?php
                        echo "<input type='hidden' id='id_viagem' name='id_viagem' value=".$viagem['id_viagem'].">";
                    ?>
                    

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button class="botao_cad">CADASTRAR</button>
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