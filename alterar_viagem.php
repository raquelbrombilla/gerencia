<?php
    session_start();
    include_once("conexao.php");

    if( !isset($_SESSION['id_usuario']) ){
        header('location: index.php');
        exit();
    }

    $id_viagem = $_GET['id'];

    $sql = "select v.*, u.nome, u.id_usuario, a.placa, a.id_dirige_usuario from viagem v, 
    usuario u, automotor a where v.id_viagem = $id_viagem 
    and v.id_usuario = u.id_usuario and v.id_usuario = a.id_dirige_usuario";
    $result = mysqli_query($bd, $sql);

    $viagem = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Viagens | Gerencia!</title>
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
        <div class="titulo_form">Alterar Viagem:</div>
            <div class="caixa_form">
                <form action="action_altViagem.php" method="POST">
                
                <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <label class="label_cad" >Placa:
                        <?php
                            echo $viagem['placa'];
                        ?>    
                        </label>
                    </div>
                        
                    <div class ="alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">   
                        <label class="label_cad"> Motorista: 
                        
                        <?php
                            echo $viagem['nome'];
                        ?>    
                        </label>
                    </div>
                </div>
                
                <?php

                    if($viagem['concluida'] == 1){
                        echo "
                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label for='dt_carregamento' class='label_cad'> Data de Carregamento </label>
                                    <input type='date' id='dt_carregamento' name='dt_carregamento' value='".$viagem['dt_carregamento']."' class='input_cadastro'>
                                
                            </div>
                                
                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label for='dt_descarregamento' class='label_cad'> Data de Descarregamento </label>
                                    <input type='date' id='dt_descarregamento' name='dt_descarregamento' value='".$viagem['dt_descarregamento']."' class='input_cadastro'>
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label for='km_saida' class='label_cad'> Km saída </label>
                                    <input type='number' id='km_saida' name='km_saida' value='".$viagem['km_saida']."' class='input_cadastro'>
                                
                            </div>
                                
                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label for='km_chegada' class='label_cad'> Km chegada </label>
                                    <input type='number' id='km_chegada' name='km_chegada' value='".$viagem['km_chegada']."' class='input_cadastro'>
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='local_carregamento' class='label_cad'> Local carregamento </label>
                                    <input type='text' id='local_carregamento' name='local_carregamento' value='".$viagem['local_carregamento']."' class='input_cadastro'>
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='destino' class='label_cad'> Destino da carga </label>
                                    <input type='text' id='destino' name='destino' value='".$viagem['destino']."' class='input_cadastro'>
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='valor_frete' class='label_cad'> Valor do frete  </label>
                                    <input type='number' id='valor_frete' name='valor_frete' value='".$viagem['valor_frete']."' class='input_cadastro'>
                            </div>
                        </div>

                        ";
                    } else if($viagem['concluida'] == 0){
                        echo "
                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                <label for='dt_carregamento' class='label_cad'> Data de Carregamento </label>
                                    <input type='date' id='dt_carregamento' name='dt_carregamento' value='".$viagem['dt_carregamento']."' class='input_cadastro'>
                                
                            </div>
                                
                            <div class ='alinhar col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>   
                                <label for='km_saida' class='label_cad'> Km saída </label>
                                    <input type='number' id='km_saida' name='km_saida' value='".$viagem['km_saida']."' class='input_cadastro'>
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='local_carregamento' class='label_cad'> Local carregamento </label>
                                    <input type='text' id='local_carregamento' name='local_carregamento' value='".$viagem['local_carregamento']."' class='input_cadastro'>
                            </div>
                        </div>

                        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>    
                            <div class='alinhar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                <label for='destino' class='label_cad'> Destino da carga </label>
                                    <input type='text' id='destino' name='destino' value='".$viagem['destino']."' class='input_cadastro'>
                            </div>
                        </div>
                        ";

                    }

                    echo "<input type='hidden' id='id_viagem' name='id_viagem' value=".$viagem['id_viagem'].">";

                ?>

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