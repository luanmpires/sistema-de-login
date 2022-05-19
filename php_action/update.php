<?php
// sessão
session_start();
// conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";
    
    try { 
        $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

        mysqli_query($connect, $sql);
        $_SESSION['mensagem'] = "Atualizado com sucesso!";

        header("location: ../index.php");
       } catch (\Exception $ex) {
          // throw new \Exception($ex->getMessage());
           $_SESSION['mensagem'] = "Erro ao atualizar";
           header("location: ../index.php");
       };
endif; 
