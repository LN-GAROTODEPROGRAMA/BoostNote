<?php 
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUE ('$nome','$email','$senha')";

    mysqli_query($conexao, $sql);

    header("Location: login.php?sucesso=1");
}



?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro - BoostNote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', sans-serif;
      }

      .card {
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        max-width: 450px;
        width: 100%;
        background-color: #fff;
      }

      .form-label {
        font-weight: 600;
      }

      .input-group-text {
        background-color: #e9ecef;
        border: none;
      }

      .form-control {
        border-radius: 10px;
      }

      .btn-primary {
        border-radius: 10px;
        font-weight: 500;
      }

      .btn-primary:hover {
        background-color: #1e61d1;
      }

      a.btn-link {
        text-decoration: none;
        font-weight: 500;
        padding-left: 0;
      }

      h2 {
        font-weight: bold;
        margin-bottom: 1.5rem;
      }
    </style>
  </head>
  <body>

    <div class="card text-center">
          <form method="POST">
      <h2>📋 Cadastro</h2>
      <form id="cadastroForm">
        <div class="mb-3 text-start">
          <label class="form-label">Nome</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" name="nome" class="form-control" required>
          </div>
        </div>

        <div class="mb-3 text-start">
          <label class="form-label">Login</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
            <input type="text" name="email" class="form-control" required>
          </div>
        </div>

        <div class="mb-4 text-start">
          <label class="form-label">Senha</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" name="senha" class="form-control" required>
          </div>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
        </div>

        <div>
          <a href="login.php" class="btn btn-link">Já tenho conta</a>
        </div>
      </form>
    </div>
</form>
 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>