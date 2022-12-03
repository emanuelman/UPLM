<?php

Class Usuario
{
    private $pdo;
    public $msgErro = ""; //tudo ok

    public function conection($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        //verificar se ja existe email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrado

        }else{
            //caso nao, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //tudo ok
        }

    }

    public function logar($email, $senha)
    {
        global $pdo;
        //verficar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){

            //entrar no sistema (sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso

        }else{
            return false; //nao foi possivel logar
        }
  
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITULO-->
    <title>UPLM - Universal Programming Language Manager</title>
    <!-- ICONE UPLM-->
    <link rel="shortcut icon" href="img/logoUPLM.png" type="image/x-con">
    <!-- Linkar o html com Css -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>