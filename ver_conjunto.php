<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == '0'){
        header('location: index.php');
        exit();
    }

    $id_automotor = $_GET['id'];

    $sql = "select * from automotor where id_automotor = $id_automotor";
    $result = mysqli_query($bd, $sql);
    $automotor = mysqli_fetch_array($result);

    $sql2 = "SELECT carreta.placa, carreta.id_carreta
    FROM carreta, automotor, usuario 
    WHERE usuario.possui_id_usuario = 19
    AND carreta.id_automotor = $id_automotor
    GROUP BY carreta.placa";
    $result2 = mysqli_query($bd, $sql2);

    $sql3 = "select u.* from usuario u, automotor a where u.id_usuario = a.id_dirige_usuario and 
    a.id_automotor = $id_automotor";
    $result3 = mysqli_query($bd, $sql3);
    $array = mysqli_fetch_array($result3);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Conjunto | Gerencia!</title>
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
        <div class="titulo_form">Conjunto:</div>
        <div class="caixa_form">

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

            <div class ="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="float: left; margin-top: 2%;">
                    <?php
                    echo "<br>";
                    echo "<p class='parag'><b> Placa do Automotor:</b> ".$automotor['placa']."  </p>";
                    
                    echo "<br>";

                    if($automotor['id_dirige_usuario']){
                        echo "<div class='row'>
                                <div class='table-responsive col-md-12'>
                                <table class='table table-striped' cellspacing='0' cellpadding='0'>
                                    <thead>
                                        <th style='color: #0d6f75; font-weight: 700;'>#</th>
                                        <th>Motorista</th>
                                        <th>Desvincular</th>
                                    <thead>
                                    <tbody>
                       
                                        <tr>
                                            <td style='color: #0d6f75; font-weight: 700;'>1</td>
                                            <td>".$array['nome']."</td>     
                                            <td><a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='desvincular_mot.php?id=".$automotor['id_automotor']."' data-confirm='Tem certeza que deseja desnvincular o item selecionado?'><i class='fas fa-ban'></i></a></td>
                                        
                                
                                        </tr>
                                
                            
                                    </tbody>
                                </table>
                                </div>
                            </div>";

                    } else {
                        echo "<p class='parag'><b> Motorista:</b> Esse automotor ainda não possui um motorista vinculado.  </p>";
                    }

                    echo "<br>";
                    
                    if(mysqli_num_rows($result2)){

                    echo "<div class='row'>
                            <div class='table-responsive col-md-12'>
                            <table class='table table-striped' cellspacing='0' cellpadding='0'>
                                <thead>
                                    <th style='color: #0d6f75; font-weight: 700;'>#</th>
                                    <th>Carreta</th>
                                    <th>Desvincular</th>
                                    <thead>
                                <tbody>";

                                $cont = 1;

                                while($carreta = mysqli_fetch_array($result2)){
                       
                                    echo "<tr>
                                            <td style='color: #0d6f75; font-weight: 700;'>".$cont."</td>
                                            <td>".$carreta['placa']."</td>     
                                            <td><a class='btn btn-success' style='background-color: #d82a3b;  border: #d82a3b;' id='btn_action' href='desvincular_carreta.php?id=".$carreta['id_carreta']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='fa fa-ban'></i></a></td>
                                        </tr>";
                                $cont++;
                                }   
                            
                            echo "</tbody>
                        </table>
                    </div>
                    </div>";
                } else {
                    echo "<p class='parag'><b> Carretas:</b> Esse automotor ainda não possui carretas vinculadas.  </p>";

                }   

                    ?>
                </div>
            </div>




        </div>
    </div>

    <?php
        include_once("link_fim.php"); 
    ?>

    <script src="js/personalizado.js"></script>

  
</body>
</html>
