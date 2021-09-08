<?php 
    require_once "class/Usuario.php";
    
    $u = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/registro.css">
    <title>Registro</title>
</head>
<body>
    <main class="container">
        <h2>Registre-se</h2>
        <form action="#" method="POST">
            <div class="input-field">
                <input type="text" name="email" id="email" placeholder="Digite seu e-mail" maxlength="40">
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome" maxlength="30">
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" maxlength="20">
                <div class="underline"></div>
            </div>

            <input type="submit" value="Registrar">

            <div class="footer">
                <span>Registre-se com</span>
                <div class="social-fields">

                    <div class="social-field facebook">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                            Entrar com Facebook
                        </a>
                    </div>

                    <div class="social-field twitter">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                            Entrar com twitter
                        </a>
                    </div>

                    <div class="social-field google">
                        <a href="#">
                            <i class="fab fa-google"></i>
                            Entrar com gmail
                        </a>
                    </div>

                </div>
            </div>

        </form>
    </main>

<?php

    if(isset($_POST['nome']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $nome = addslashes($_POST['nome']);

        if(!empty($email) AND !empty($senha) AND !empty($nome))
        {
            if($u->cadastrar($email, $senha, $nome))
            {
                ?>
                <div id="msg-ok">Cadastrado com sucesso!</div>
                <?php 
            }
            else
            {
                ?>
                <div class="msg-erro">E-mail já cadastrado!</div>
                <?php 
            }
        }
        else
        {
            ?>
            <div class="msg-erro">Preencha todos os campos!</div>
            <?php 
        }
    }
?>

</body>
</html>