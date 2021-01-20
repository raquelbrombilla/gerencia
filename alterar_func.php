<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_usuario = $_GET['id'];
    
    $sql = "select * from usuario where id_usuario = $id_usuario";
    $result = mysqli_query($bd, $sql);

    $usuario = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> Perfil | Gerencia!</title>
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
        <div class="titulo_form">Alterar perfil:</div>
            <div class="caixa_form">
                <form action="action_altFunc.php" method="POST"> 

                <?php
                  echo "<input type='hidden' id='id_usuario' name='id_usuario' value=".$usuario['id_usuario'].">";
                ?>
                  
                <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='nome' class='label_cad'> Nome </label>
                                    <?php
                                        echo "<input type='text' id='nome' name='nome' value='".$usuario['nome']."' class='input_cadastro' >";
                                    ?>                             
                            </div>
                        </div>        
                        
                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label  for='cpf' class='label_cad'> CPF </label>
                                    <?php
                                    echo "<input type='text' id='cpf' name='cpf' value='".$usuario['cpf']."' class='input_cadastro' >";
                                    ?>
                            </div>

                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label for='cnh' class='label_cad'> CNH </label>
                                    <?php
                                        if($usuario['cnh'] == null){
                                            echo "<input type='text' id='cnh' name='cnh' placeholder='Não há dados ainda.' class='input_cadastro' >"; 
                                        } else{
                                            echo "<input type='text' id='cnh' name='cnh' value='".$usuario['cnh']."' class='input_cadastro' >";
                                        }
                                    ?>                            
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label for='dt_admissao' class='label_cad'> Data de Admissão </label>
                                    <?php
                                    echo "<input type='date' id='dt_admissao' name='dt_admissao' value=".$usuario['dt_admissao']." class='input_cadastro' >";
                                    ?>
                            </div>
                                
                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label for='dt_nasc' class='label_cad'> Data de Nascimento </label>
                                    <?php
                                        if($usuario['dt_nasc'] == null){
                                            echo "<input type='text' id='dt_nasc' name='dt_nasc' placeholder='Não há dados ainda.' class='input_cadastro' >"; 
                                        } else{
                                            echo "<input type='date' id='dt_nasc' name='dt_nasc' value=".$usuario['dt_nasc']." class='input_cadastro' >";
                                        }
                                    ?>                            
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='endereco' class='label_cad'> Endereço </label>
                                <?php
                                    if($usuario['endereco'] == null){
                                        echo "<input type='text' id='endereco' name='endereco' placeholder='Não há dados ainda.' class='input_cadastro' >"; 
                                    } else{
                                        echo "<input type='text' id='endereco' name='endereco' value='".$usuario['endereco']."' class='input_cadastro' >";
                                    }                                
                                ?>                             
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='telefone' class='label_cad'> Telefone </label>
                                <?php
                                     if($usuario['telefone'] == null){
                                        echo "<input type='text' id='telefone' name='telefone' placeholder='Não há dados ainda.' class='input_cadastro' >"; 
                                    } else{
                                        echo "<input type='text' id='telefone' name='telefone' value='".$usuario['telefone']."' class='input_cadastro' >";
                                    }  
                                ?>                             
                            </div>
                        </div>        

                <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%;">
                    <div class="alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <button class="botao_cad">ALTERAR</button>
                    </div>
                </div>
            
                 </form>     
            </div>
    </div>
    <?php
        include_once("link_fim.php"); 
    ?>
  
</body>
</html>