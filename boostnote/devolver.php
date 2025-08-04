
<?php
include 'conexao.php';

if (isset($_GET['devolver'])) {
    $id = intval($_GET['devolver']);
    $conexao->query("UPDATE equipamentos SET status = 0 WHERE id = $id");
    header("Location: devolver.php");
    exit();
}
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devolver - BoostNote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      body {
        background: linear-gradient(to right, rgb(69, 0, 143), #2575fc);
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', sans-serif;
        padding: 20px;
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

      .card {
        padding: 20px;
        border-radius: 10px;
        background-color: #1c1c1c;
        color: white;
        width: 100%;
        max-width: 1000px;
      }
    </style>
  </head>
  <body>

    <h1 class="text-white mb-4">Devolver Equipamentos</h1>

    <div class="row w-100 justify-content-center">
      <div class="col-12">
        <div class="card">

          <select class="form-select mb-3" aria-label="Filtrar por tipo" id="filterSelect">
            <option value="0" selected>Todos</option>
            <option value="1">ChromeBooks</option>
            <option value="2">Positivo</option>
          </select>

          <table class="table text-white">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Obs</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody id="tableBody">
              <?php
                $sql = "SELECT * FROM equipamentos WHERE status = 1";
                $resultado = mysqli_query($conexao, $sql);
                while ($equipamentos = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>
                            <td>{$equipamentos['id']}</td>
                            <td>{$equipamentos['nome']}</td>
                            <td>{$equipamentos['status']}</td>
                            <td>{$equipamentos['obs']}</td>
                            <td>
<a href='devolver.php?devolver={$equipamentos['id']}' class='btn btn-sm btn-primary'>DEVOLVER</a>
                            </td>
                          </tr>";
                }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <a href="tela_inicial.php" class="btn btn-login">Voltar</a>

    <script>
      document.getElementById('filterSelect').addEventListener('change', function () {
        var filterValue = this.value;
        var tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        fetch('filtro.php?tipo=' + filterValue)
          .then(response => response.json())
          .then(data => {
            data.forEach(item => {
              var row = `<tr>
                          <td>${item.id}</td>
                          <td>${item.nome}</td>
                          <td>${item.status}</td>
                          <td>${item.obs}</td>
                          <td>
                            <a href='verificar.php?id=${item.id}&status=0' class='btn btn-sm btn-primary'>DEVOLVER</a>
                          </td>
                        </tr>`;
              tableBody.innerHTML += row;
            });
          });
      });
    </script>

  </body>
</html>
