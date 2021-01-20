<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $sql = "select id_automotor, placa from automotor";
    $result = mysqli_query($bd, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cadastro de Carretas | Gerencia!</title>
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
        <div class="titulo_form">Cadastro de Carretas:</div>
            <div class="caixa_form">
                <form action="action_carreta.php" method="POST">
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
                            <label for="placa" class="label_cad"> Placa </label>
                            <input type="text" id="placa" name="placa" placeholder="Ex: IQK7895" class="input_cadastro" pattern=".{7,7}" required>
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="marca" class="label_cad"> Marca/Modelo </label>
                            <input type="text" id="marca" name="marca" placeholder="Informe a marca e o modelo da carreta." class="input_cadastro" required>
                        </div>
                    </div>
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="ano" class="label_cad"> Data de fabricação </label>
                        <?php
                            echo "<input type='date' id='ano' name='ano' value='".date("d/m/Y")."' class='input_cadastro' required>";
                        ?>
                        </div>
                    </div>
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label for="renavam" class="label_cad"> Renavam </label>
                            <input type="number" id="renavam" name="renavam" placeholder="Informe o nº do renavam da carreta." class="input_cadastro" pattern=".{11,11}" required>
                        </div>
                        
                        <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                            <label for="chassi" class="label_cad"> Chassi </label>
                            <input type="text" id="chassi" name="chassi" placeholder="Informe o nº do chassi da carreta." class="input_cadastro" pattern=".{17,17}" required>
                        </div>
                    </div>
                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="antt" class="label_cad"> ANTT </label>
                            <input type="number" id="antt" name="antt" placeholder="Informe a ANTT da carreta." class="input_cadastro" pattern=".{11,11}" required>
                        </div>
                    </div>

                    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label class="label_cad"></label>
                            <button class="botao_cad">CADASTRAR</button>
                        </div>
                    </div>
                </form>
            </div> <!-- caixa form -->
    </div> <!-- container -->

    <script>

        

    </script>

    <?php
        include_once("link_fim.php"); 
    ?>

</body>
</html>