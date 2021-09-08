<?php

class Usuario {

    private $idusuario;
    private $email;
    private $senha;
    private $nome;

    public function getIdusuario(){

        return $this->idusuario;

    }

    public function setIdusuario($value){

        $this->idusuario = $value;

    }

    public function getEmail(){

        return $this->email;

    }

    public function setEmail($value){

        $this->email = $value;

    }

    public function getSenha(){

        return $this->senha;

    }

    public function setSenha($value){

        $this->senha = $value;

    }

    public function getNome(){

        return $this->nome;

    }

    public function setNome($value){

        $this->nome = $value;

    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM usuario WHERE idusuario = :ID", array(

            ":ID" => $id

        ));

        if (count($results) > 0) {

            $this->setData($results[0]);

        }

    }

    public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM usuario ORDER BY email;");

    }

    public static function search($email){

        $sql = new Sql();

        return $sql->select("SELECT * FROM usuario WHERE email LIKE :SEARCH ORDER BY email", array(

            ':SEARCH'=>"%".$email."%"

        ));

    }

    public function login($email, $password){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM usuario WHERE email = :email AND senha = :PASSWORD", array(

            ":LOGIN"=>$email,
            ":PASSWORD"=>$password,

        ));

        if (count($results) > 0) {

            $this->setData($results[0]);

        } else {

            throw new Exception("Login e/ou senha inválidos.");

        }

    }

    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
        $this->setNome($data['nome']);

    }

    public function insert(){

        $sql = new Sql();

        $results = $sql->select("CALL sp_usuarios_insert(:email, :PASSWORD)", array(

            ':email'=>$this->getEmail(),
            ':PASSWORD'=>$this->getSenha()

        ));

        if (count($results) > 0) {

            $this->setData($results[0]);

        }

    }

    public function update($email, $password){

        $this->setEmail($email);
        $this->setSenha($password);

        $sql = new Sql();

        $sql->query("UPDATE usuario SET email= :email, senha = :PASSWORD WHERE idusuario = :ID", array(

            ':email'=>$this->getEmail(),
            ':PASSWORD'=>$this->getSenha(),
            ':ID'=>$this->getIdusuario()

        ));

    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE * FROM usuario WHERE idusuario = :ID", array(

            ':ID'=>$this->getIdusuario()

        ));

        $this->setIdusuario(0);
        $this->setEmail("");
        $this->setSenha("");
        $this->setNome("");

    }

    public function __construct($email = "", $password = ""){

        $this->setEmail($email);
        $this->setSenha($password);

    }

    public function __toString(){

        return json_encode(array(

            "idusuario"=>$this->getIdusuario(),
            "email"=>$this->getEmail(),
            "senha"=>$this->getSsenha(),
            "nome"=>$this->getNome()

        ));

    }

}

?>