<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cadastro de Usuários | Gerencia!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <?php
        include_once("link.php"); 
    ?>


</head>
<body>
    
    <div class="container">
        <div class="cadastro col-xl-6 col-lg-7 col-md-9 col-sm-10 col-12">

            
            <div class="desc_cadastro">
                Preencha os campos para realizar o seu cadastro.
            </div>

            <?php
                if(isset($_SESSION['mensagem'])) {
                    echo $_SESSION['mensagem'];
                    unset($_SESSION['mensagem']);
                }
            ?>

            <form action="action_usuario.php" method="POST">
            
                <label for="nome" >Nome </label>
                <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" class="input_cad" required>

                <label for="cpf" class="campo">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="Ex: 000000000-00 (somente números)" class="input_cad"  pattern=".{11,11}" required>

                <label for="senha" class="campo">Senha </label>
                <input type="password" id="senha" name="senha" placeholder="Mínimo 5 caracteres e máximo 10" class="input_cad" pattern=".{5,10}" required>

                
                <button class="botao_login">ENVIAR</button>

                <hr>

                <p> Já possui cadastro? <a class="style_a" href="index.php">Faça seu login aqui</a>.</p>


            </form>

        </div>
    </div>


</body>
</html>

