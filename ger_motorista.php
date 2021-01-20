<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_automotor = $_GET['id'];
    $id_usuario = $_SESSION['id_usuario'];

    $sql ="SELECT usuario.nome, usuario.id_usuario
    FROM usuario
    WHERE usuario.possui_id_usuario = $id_usuario
    AND usuario.status = '1'
    AND usuario.id_usuario NOT IN 
    (SELECT usuario.id_usuario
    FROM usuario, automotor
    WHERE usuario.id_usuario = automotor.id_dirige_usuario)";
    $result = mysqli_query($bd, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Escolher Motorista | Gerencia!</title>
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
        <div class="titulo_form">Escolha o motorista:</div>
        <div class="caixa_form">
            
                <?php

                echo "<form action='action_gerMotorista.php' method='POST'>";

                ?>

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

                if(mysqli_num_rows($result) ){
                    while($motorista = mysqli_fetch_array($result)){

                        echo "
                        <div class='radio'>
                            <label><input type='radio' name='optradio' id='optradio' value='".$motorista['id_usuario']."' required>  ".$motorista['nome']."</label>
                        </div>"; 
                    } 

                    echo "<input type='hidden' id='id_automotor' name='id_automotor' value=".$id_automotor.">";

                    echo "
                    <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style='margin-top: 5%;'>
                        <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                        <button class='botao_cad'>CADASTRAR</button>
                        </div>
                    </div>";

                    echo "</form>";

                } else {
                    echo "<br>";
                    echo "<p class='parag'><b>Não há motoristas cadastrados sem automotores.</b></p>";
                }

                ?>
            </form>
        </div>
    </div>

    
    <?php
        include_once("link_fim.php"); 
    ?>
  
</body>
</html>