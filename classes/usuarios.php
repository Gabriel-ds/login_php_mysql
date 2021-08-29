<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //Verificar se já existe o e-mail cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;       //Já cadastrado
        } else {
            //caso não, Cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", $senha);
            $sql->execute();
            return true;
        }

    }

    public function logar($email, $senha)
    {
        global $pdo;
        
    }
}

?>