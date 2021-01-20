<?php
    session_start();

    if($_SESSION['tipo'] == 0 ){
        header('location: index.php');
        exit();
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cadastro de Funcionários | Gerencia!</title>
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

        <div class="titulo_form">Cadastro de Funcionários:</div>
            <div class="caixa_form">
                <form action="action_funcionario.php" method="POST">
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
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="nome" class="label_cad"> Nome </label>
                            <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" class="input_cadastro" required>
                        </div>
                    </div>
                    
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="cpf" class="label_cad"> Número do CPF </label>
                            <input type="number" id="cpf" name="cpf" placeholder="Ex: 000.000.000-00 (apenas números)" class="input_cadastro" pattern=".{11,11}" required>
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="data" class="label_cad"> Data de admissão  </label>
                        <?php
                            echo "<input type='date' id='data' name='data' value='".date("d/m/Y")."' class='input_cadastro' required>";
                        ?>
                        </div>
                    </div>
                    
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="senha" class="label_cad"> Senha  </label>
                            <input type="password" id="senha" name="senha" placeholder="Mínimo 5 caracteres e máximo 10" class="input_cadastro" pattern=".{5,10}" required>
                        </div>
                    </div>
                            
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="botao_cad">CADASTRAR</button>
                        </div>
                    </div>
                </form>
            </div> <!-- caixa form -->
    </div> <!-- container -->

    <?php
        include_once("link_fim.php"); 
    ?>

</body>
</html>