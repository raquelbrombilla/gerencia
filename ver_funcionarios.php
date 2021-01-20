<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_usuario = $_GET['id'];

    $sql ="select * from usuario where id_usuario = $id_usuario";
    $result = mysqli_query($bd, $sql);

    $func = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Funcionários | Gerencia!</title>
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
        <div class="titulo_form">Dados do Funcionário:</div>
            <div class="caixa_form">

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Nome </label>
                                <?php
                                    echo "<input type='text' value='".$func['nome']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                ?>                             
                            </div>
                        </div>
                        
                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> CPF </label>
                                    <?php
                                    echo "<input type='text' value='".$func['cpf']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                    ?>
                            </div>

                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label class='label_cad'> CNH </label>
                                    <?php
                                        if($func['cnh'] == null){
                                            echo "<input type='text' value='Não há dados ainda.' class='input_cadastro' style='background-color: #ecebeb75;' readonly>"; 
                                        } else{
                                            echo "<input type='text' value='".$func['cnh']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                        }
                                    ?>                            
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Data de Admissão </label>
                                    <?php
                                    echo "<input type='date' value=".$func['dt_admissao']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                    ?>
                            </div>
                                
                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label class='label_cad'> Data de Nascimento </label>
                                    <?php
                                        if($func['dt_nasc'] == null){
                                            echo "<input type='text' value='Não há dados ainda.' class='input_cadastro' style='background-color: #ecebeb75;' readonly>"; 
                                        } else{
                                            echo "<input type='date' value=".$func['dt_nasc']." class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                        }
                                    ?>                            
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Endereço </label>
                                <?php
                                    if($func['endereco'] == null){
                                        echo "<input type='text' value='Não há dados ainda.' class='input_cadastro' style='background-color: #ecebeb75;' readonly>"; 
                                    } else{
                                        echo "<input type='text' value='".$func['endereco']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                    }                                
                                ?>                             
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label class='label_cad'> Telefone </label>
                                <?php
                                     if($func['telefone'] == null){
                                        echo "<input type='text' value='Não há dados ainda.' class='input_cadastro' style='background-color: #ecebeb75;' readonly>"; 
                                    } else{
                                        echo "<input type='text' value='".$func['telefone']."' class='input_cadastro' style='background-color: #ecebeb75;' readonly>";
                                    }  
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