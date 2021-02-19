<?php
    session_start();

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $id_viagem = $_GET['id'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cadastro de despesas | Gerencia!</title>
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
        <div class="titulo_form">Cadastro de Despesas:</div>
            <div class="caixa_form">
                <form action="action_despesa.php" method="POST">

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="data" class="label_cad"> Data </label>
                            <?php
                            echo "<input type='date' id='data' name='data' value='".date("d/m/Y")."' class='input_cadastro' required>";
                            ?>
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="estabelecimento" class="label_cad"> Estabelecimento </label>
                            <input type="text" id="estabelecimento" name="estabelecimento" placeholder="Informe o nome do estabelecimento." class="input_cadastro" required>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="descricao" class="label_cad"> Descrição </label>
                            <input type="text" id="descricao" name="descricao" placeholder="Informe a descrição da despesa." class="input_cadastro" required>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="valor" class="label_cad"> Valor </label>
                            <input type="number" id="valor" name="valor" placeholder="Informe o valor da despesa." class="input_cadastro" required>
                        </div>
                    </div>

                    <?php
                    echo "<input type='hidden' id='id_viagem' name='id_viagem' value=".$id_viagem.">";
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