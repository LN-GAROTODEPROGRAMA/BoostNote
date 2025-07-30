<?php
session_start();
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$login'";
    $res = mysqli_query($conexao, $sql);
    $usuarios = mysqli_fetch_assoc($res);
    if ($usuarios && password_verify(password: $senha, $usuarios['senha'])) {
        $_SESSION['usuarios'] = $usuarios['nome'];
        header("Location: tela_inicial.php");
    }else{
        echo"<div class=\"alert alert-danger\" role=\"alert\">
        Login ou senha incorreto!
        </div>";
    }

}
?>

