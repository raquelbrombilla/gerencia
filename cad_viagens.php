<?php
    session_start();

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }
?>
 

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cadastro de Caminhões | Gerencia!</title>
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
        <div class="titulo_form">Cadastro de Viagens:</div>
            <div class="caixa_form">
                <form action="action_viagem.php" method="POST">
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
                            echo "<input type='date' id='dt_carregamento' name='dt_carregamento' value='".date("d/m/Y")."' class='input_cadastro' required>";
                        ?>
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="km_saida" class="label_cad"> Km saída </label>
                            <input type="number" id="km_saida" name="km_saida" placeholder="Informe sua quilometragem inicial." class="input_cadastro" required>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="local_carreg" class="label_cad"> Local de carregamento </label>
                            <input type="text" id="local_carreg" name="local_carreg" placeholder="Informe o local de carregamento." class="input_cadastro" required>
                        </div>
                    </div>
                    
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <label for="destino" class="label_cad"> Destino da carga </label>
                        <input type="text" id="destino" name="destino" placeholder="Informe o local destino da carga." class="input_cadastro" required>
                        </div>
                    </div>
                    
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