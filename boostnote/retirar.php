<?php include 'conexao.php'; ?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retirar - BoostNote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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

      .table {
        color: white;
      }

      .table thead {
        background-color: #343a40;
      }

      .table tbody tr:hover {
        background-color: #2d2d44;
      }

      .btn-primary {
        background-color: #6c63ff;
        border: none;
      }

      .btn-primary:hover {
        background-color: #7d70ff;
      }

      .btn-login {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 30px;
        font-size: 1.1rem;
        border: 2px solid white;
        background: transparent;
        color: white;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.3s ease;
      }

      .btn-login:hover {
        background-color: white;
        color: #7f00ff;
      }
    </style>
  </head>
  <body>

    <div class="card">
      <h3 class="mb-4 text-center">Equipamentos Disponíveis</h3>

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
              <th>Ação</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <?php
              $sql = "SELECT * FROM equipamentos WHERE status = 0";
              $resultado = mysqli_query($conexao, $sql);
              while ($equipamentos = mysqli_fetch_assoc($resultado)) {
                  echo "<tr>
                          <td>{$equipamentos['nome']}</td>
                          <td>{$equipamentos['status']}</td>
                          <td>{$equipamentos['obs']}</td>
                          <td>
                            <a href='verificar.php?id={$equipamentos['id']}&status=0' class='btn btn-sm btn-primary'>RETIRAR</a>
                          </td>
                        </tr>";
              }
            ?>