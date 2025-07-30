<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Notebooks</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5rem;
            font-style: italic;
            border-bottom: 2px solid white;
            display: inline-block;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 15px 0;
            background-color: white;
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }

        .btn:hover {
            transform: scale(1.03);
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="container">

<h1><strong>Selecione:</strong></h1>

    <form method="post" action="retirar.php">
        <button class="btn" type="submit">RETIRAR</button>
    </form>

    <form method="post" action="ocupados.php">
        <button class="btn" type="submit">OCUPADOS</button>
    </form>

    <form method="post" action="devolver.php">
        <button class="btn" type="submit">DEVOLVER</button>
    </form>

    <form method="post" action="problema.php">
        <button class="btn" type="submit">RELATAR PROBLEMAS</button>
    </form>
</div>

</body>
</html>
