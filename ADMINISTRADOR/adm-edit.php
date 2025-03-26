<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espaços - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Livro
                            <a href="./adm-index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id_livro'])){
                                $livro_id = mysqli_real_escape_string($conexao, $_GET['id_livro']);
                                $sql = "SELECT * FROM livro WHERE id_livro='$livro_id'";
                                $query = mysqli_query($conexao, $sql);

                                if(mysqli_num_rows($query) > 0){
                                    $livro = mysqli_fetch_array($query);
                                }
                        ?>
                        <form action="../ACOES/acoes.php" method="POST">
                            <input type="hidden" name="livro_id" value="<?= $livro['id_livro'] ?>">
                            <div class="mb-3">
                                <label>Título</label>
                                <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Autor</label>
                                <input type="text" name="autor" value="<?= $livro['autor'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Gênero</label>
                                <input type="text" name="genero" value="<?= $livro['genero'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Ano de Publicação</label>
                                <input type="text" name="ano_publicacao" value="<?= $livro['ano_publicacao'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>ISBN</label>
                                <input type="text" name="isbn" value="<?= $livro['isbn'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type-="submit" name="update_livro" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                            } else{
                                echo "<h5>Espaço Não Encontrado!</h5>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>