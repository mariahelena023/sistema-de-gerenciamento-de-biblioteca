<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container mt-4">
        <?php include('../ACOES/mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Lista de Livros</h4>
                        <input type="text" id="filtroLivros" class="form-control w-50" placeholder="Filtrar por gênero ou ano...">
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Gênero</th>
                                    <th>Ano de Publicação</th>
                                    <th>ISBN</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaLivros">
                                <?php
                                    $sql = "SELECT * FROM livro";
                                    $livros = mysqli_query($conexao, $sql);
                                    if(mysqli_num_rows($livros) > 0){
                                        foreach($livros as $livro){
                                ?>
                                <tr>
                                    <td><?= $livro['id_livro'] ?></td>
                                    <td><?= $livro['titulo'] ?></td>
                                    <td><?= $livro['autor'] ?></td>
                                    <td class="genero"><?= $livro['genero'] ?></td>
                                    <td class="ano"><?= $livro['ano_publicacao'] ?></td>
                                    <td><?= $livro['isbn'] ?></td>
                                </tr>
                                <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="6" class="text-center">Nenhum Livro Encontrado!</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <a href="../index.php" class="btn btn-danger float-start">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('filtroLivros').addEventListener('input', function() {
            let filtro = this.value.toLowerCase();
            let linhas = document.querySelectorAll("#tabelaLivros tr");

            linhas.forEach(linha => {
                let genero = linha.querySelector(".genero").textContent.toLowerCase();
                let ano = linha.querySelector(".ano").textContent.toLowerCase();

                if (genero.includes(filtro) || ano.includes(filtro)) {
                    linha.style.display = "";
                } else {
                    linha.style.display = "none";
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
