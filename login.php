<?php
    require_once "Usuario.php";

    $u = new Usuario();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form action="#" method="POST">
            <div class="input-field">
                <input type="text" name="email" id="email" placeholder="Digite seu e-mail">
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                <div class="underline"></div>
            </div>

            <input type="submit" value="Continuar">

            <div class="footer">
                <span>Faça login com</span>
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

        if(!empty($email) AND !empty($senha))
        {
            if($u->logar($email, $senha))
            {
                header("index.html");
            }
            else
                echo "E-mail e/ou senha estão incorretos!";
        }
        else
        {
            echo "Preencha todos os campos!";
        }
    }
?>


</body>
</html>