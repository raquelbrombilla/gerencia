<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Login - Gerencia!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <?php
        include_once("link.php"); 
    ?>


</head>
<body>

    <div class="container">
        
        <div class="form-login col-xl-5 col-lg-6 col-md-8 col-sm-9 col-11">
            
            <img src="images/logo_caminhao.png" class="logo_caminhao">  
            
            
            <div class="desc_login">
                Olá! Faça login para continuar.
            </div>

            <?php
                if(isset($_SESSION['mensagem'])) {
                    echo $_SESSION['mensagem'];
                    unset($_SESSION['mensagem']);
                }
            ?>
            <form action="login.php" method="POST"> 

                <input type="text" id="cpf" name="cpf" placeholder="CPF" class="input_login">
                <br>
                <input type="password" id="senha" name="senha" placeholder="Senha" class="input_login">
                <br>
                <button class="botao_login">ENTRAR</button>

                <hr>

                <p> Não possui login? <a class="style_a" href="cad_usuario.php">Cadastre-se aqui</a>.</p>
                
            </form>
        </div>
    </div>
    
</body>
</html>