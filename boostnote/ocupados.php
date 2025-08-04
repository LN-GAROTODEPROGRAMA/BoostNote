<?php
include 'conexao.php';

$resultado = $conexao->query("SELECT * FROM equipamentos WHERE status = 1");
$equipamentos = [];

if ($resultado->num_rows > 0) {
    while ($equipamento = $resultado->fetch_assoc()) {
        $equipamentos[] = $equipamento;
    }
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Equipamentos Ocupados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, rgb(69, 0, 143), #2575fc);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
    }
    .card {
      background-color: #1e1e2f;
      color: white;
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      padding: 30px;
      width: 100%;
      max-width: 1000px;
    }
    .form-select {
      margin-bottom: 20px;
      background-color: #2a2a3b;
      color: white;
      border: none;
    }

    .btn-login {
        margin-top: 20px;
        padding: 10px 30px;
        font-size: 1.2rem;
        border: 2px solid white;
        background: transparent;
        color: white;
        border-radius: 30px;
        transition: all 0.3s ease;
      }

    .table {
      color: white;
    }
    .table thead {
      background-color: #343a40;
    }
    .table tbody tr:hover {
      background-color: #2d2d44;
    }
  </style>
</head>
<body>

<div class="card">
  <h3 class="mb-4 text-center">Equipamentos Ocupados</h3>

  <select class="form-select" id="filterSelect">
    <option value="0" selected>Todos</option>
    <option value="1">ChromeBooks</option>
    <option value="2">Positivo</option>
  </select>

  <div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Status</th>
          <th>Obs</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <?php if (!empty($equipamentos)) : ?>
          <?php foreach ($equipamentos as $eqp): ?>
            <tr>
              <td><?= htmlspecialchars($eqp['nome']) ?></td>
              <td><?= $eqp['status'] ?></td>
              <td><?= htmlspecialchars($eqp['obs']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center">Nenhum equipamento ocupado no momento.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<br>

  <a href="tela_inicial.php" class="btn btn-login">Voltar</a>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>