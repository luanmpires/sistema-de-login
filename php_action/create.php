<?php
// sessão
session_start();
// conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    try { 
        $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

        mysqli_query($connect, $sql);
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";

        header("location: ../index.php");
       } catch (\Exception $ex) {
          // throw new \Exception($ex->getMessage());
           $_SESSION['mensagem'] = "Erro ao cadastrar";
           header("location: ../index.php");
       };
endif; 
