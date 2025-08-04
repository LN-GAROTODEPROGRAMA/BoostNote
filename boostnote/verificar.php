<?php
session_start();
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuarios = '$login'";
    $res = mysqli_query($conexao, $sql);
    $usuarios = mysqli_fetch_assoc($res);
    if ($usuarios && password_verify($senha, $usuarios['senha'])) {
        $_SESSION['usuarios'] = $usuarios['email'];
    }else{
        echo"<div class=\"alert alert-danger\" role=\"alert\">
        Login ou senha incorreto!
        </div>";
    }

}