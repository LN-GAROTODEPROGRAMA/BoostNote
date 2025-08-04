<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['obs'])) {
        $id = intval($_POST['id']);
        $obs = $conexao->real_escape_string($_POST['obs']);

        $sql = "UPDATE equipamentos SET obs = '$obs' WHERE id = $id";
        if ($conexao->query($sql)) {
            echo "Problema relatado com sucesso!";
        } else {
            echo "Erro ao relatar problema: " . $conexao->error;
        }
    } else {
        echo "ID ou observação não enviados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatar Problema</title>
    <style>
        body { font-family: Arial; background: linear-gradient(to right, #4e00c2, #00c2ff); color: white; }
        .card { background: #1e1e2f; padding: 30px; margin: 50px auto; width: 400px; border-radius: 10px; }
        input, textarea, button { width: 100%; padding: 10px; margin-top: 10px; border-radius: 5px; border: none; }
        button { background-color: #7b5cfa; color: white; cursor: pointer; }
        button:hover { background-color: #5a3ee6; }
    </style>
</head>
<body>

<div class="card">
    <h2>Relatar Problema</h2>
   <form method="post">
    <label for="id">Nome do equipamento:</label><br>
    <input type="text" name="id" required><br><br>

    <label for="obs">Descrição do problema:</label><br>
    <textarea name="obs" rows="4" cols="50" required></textarea><br><br>

    <button type="submit">Relatar Problema</button>
</form>
</div>

</body>
</html>