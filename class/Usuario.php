<?php

    class Usuario extends PDO
    {
        private $conexao;

        public function __construct() 
        {
            $this->conexao = new PDO("mysql:host=localhost; dbname=login", "root", "");
        }

        public function cadastrar($email, $nome, $senha)
        {
            $sql = $this->conexao->prepare("SELECT idusuario FROM usuario WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();
            
            if($sql->rowCount() > 0)
                return false;
            else
            {
                $sql = $this->conexao->prepare("INSERT INTO usuario(email, nome, senha) VALUES (:email, :nome, :senha)");
                $sql->bindValue(":email", $email);
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":senha", md5($senha));
                $sql->execute();

                return true;
            }
        }

        public function logar($email, $senha)
        {
            $sql = $this->conexao->prepare("SELECT idusuario FROM usuario WHERE email = :email AND senha = :senha");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":email", $senha);
            $sql->execute();

            if($sql->rowCount() > 0)
            {
                $dado = $sql->fetch();
                session_start();
                $_SESSION['idUser'] = $dado['idusuario'];

                return true;
            }
            else
                return false;
        }
    }

?>