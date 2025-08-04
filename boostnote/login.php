<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $res = $stmt->get_result();
    $usuario = $res->fetch_assoc();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['email'] = $usuario['email'];
        header("Location: tela_inicial.php");
        exit;
    } else {
      $erro_login = "Login ou senha incorreto!";
    }

    $stmt->close();
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BoostNote Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #7f00ff, #00c6ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border: none;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }
    .form-control {
      border-radius: 10px;
    }
    .form-label {
      font-weight: 500;
    }
    .btn-primary {
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #005dc1;
    }
    .form-icon {
      position: absolute;
      top: 10px;
      left: 10px;
      color: #0072ff;
    }
    .input-group .form-control {
      padding-left: 2.5rem;
    }
  </style>
</head>
<body>

<div class="card text-center w-100" style="max-width: 400px;">
  <h2 class="mb-4 fw-bold">🚀 BoostNote Login</h2>
  
  <?php if (!empty($erro_login)): ?>
    <div class="alert alert-danger text-center" role="alert">
      <?= $erro_login ?>
    </div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-4 position-relative">
      <label for="email" class="form-label text-start w-100">Email</label>
      <div class="input-group">
        <span class="form-icon"><i class="bi bi-envelope-fill"></i></span>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
      </div>
    </div>

    <div class="mb-4 position-relative">
      <label for="password" class="form-label text-start w-100">Senha</label>
      <div class="input-group">
        <span class="form-icon"><i class="bi bi-lock-fill"></i></span>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="********" required>
      </div>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-lg" id="loginBtn">
      Entrar</a>
        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
      </button>
    </div>

    <div class="mt-3">
      <a href="#" class="text-decoration-none text-muted">Esqueceu a senha?</a>
    </div>
  </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>