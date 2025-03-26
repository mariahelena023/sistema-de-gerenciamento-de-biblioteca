<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container mt-4">
        <?php include('../ACOES/mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Livros
                            <a href="adm-create.php" class="btn btn-primary float-end">Adicionar Livro</a>
                        </h4>
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
                                    <th>Ações</th> 
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
                                    <td>
                                        <a href="adm-view.php?id_livro=<?= $livro['id_livro'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                        <a href="adm-edit.php?id_livro=<?= $livro['id_livro'] ?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="../ACOES/acoes.php" type="submit" method="POST" class="d-inline">
                                            <button onclick = "return confirm('Tem Certeza que Deseja Excluir?')" type="submit" name="delete_livro" value="<?= $livro['id_livro'] ?>" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="7" class="text-center">Nenhum Livro Encontrado!</td></tr>';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>