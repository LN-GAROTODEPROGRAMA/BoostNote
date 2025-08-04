<?php

$servername = "localhost";
$username = "root";
$database = "test";
$password = "";

$conexao = mysqli_connect($servername, $username, $password, $database);

if (!$conexao) {
die("Connection failed: ". mysqli_connect_error());
}

?>