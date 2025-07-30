<?php

?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BoostNote - Welcome</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
margin: 0;
padding: 0;
height: 100vh;
background:linear-gradient(to right, #6a11cb, #2575fc);
display: flex;
justify-content: center;
align-items: center;
overflow: hidden;
font-family: 'Segoe UI', sans-serif;
color: white;
}

.welcome-container {
text-align: center;
position: relative;
z-index: 2;
}

h1 {
font-size: 5rem;
font-color: rgb(0, 0, 0);
font-weight: bold;
letter-spacing: 2px;
text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
}

.btn-login {
margin-top: 30px;
padding: 10px 30px;
font-size: 1.2rem;
border: 2px solid white;
background: transparent;
color: white;
border-radius: 30px;
transition: all 0.3s ease;
}

.btn-login:hover {
background-color: white;
color: #7f00ff;
}

.botao {
    font-color:"#fff";
}

</style>
</head>
<body>

<!-- Decorative Shapes -->
<div class="shape circle"></div>
<div class="shape wave"></div>
<div class="shape cube"></div>

<!-- Content -->
<div class="welcome-container">
<h1>BOOST<br>NOTE</h1>
<a href="login.php" class="btn btn-login">Login</a>
<br>
<a href="registrar.php" class="btn btn-link botao">Não tem uma conta?</a>
</div>



</body>
</html>