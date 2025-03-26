<?php
    session_start();
    require '../DB/conexao.php';

    if(isset($_POST['create_livro'])){
        $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
        $ano_publicacao = mysqli_real_escape_string($conexao, trim($_POST['ano_publicacao']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
    
        $sql = "INSERT INTO livro (titulo, autor, genero, ano_publicacao, isbn) VALUES ('$titulo', '$autor', '$genero', '$ano_publicacao', '$isbn')";
    
        if(mysqli_query($conexao, $sql)){
            $_SESSION['mensagem'] = 'Livro Adicionado com Sucesso!';
            header('Location: ../ADMINISTRADOR/adm-index.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Erro ao Adicionar Livro: ' . mysqli_error($conexao);
            header('Location: ../ADMINISTRADOR/adm-index.php');
            exit;
        }
    }

    if(isset($_POST['update_livro'])){
        $livro_id = mysqli_real_escape_string($conexao, $_POST['livro_id']);
        $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
        $ano_publicacao = mysqli_real_escape_string($conexao, trim($_POST['ano_publicacao']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));


        $sql = "UPDATE livro SET titulo = '$titulo', autor = '$autor', genero = '$genero', ano_publicacao = '$ano_publicacao', isbn = '$isbn' WHERE id_livro = '$livro_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Livro Atualizado com Sucesso!';
            header('Location: ../ADMINISTRADOR/adm-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Erro ao Atualizar Usuário: ' . mysqli_error($conexao);
            header('Location: ../ADMINISTRADOR/adm-index.php');
            exit;
        }
    }

    if(isset($_POST['delete_livro'])){
        $livro_id = mysqli_real_escape_string($conexao, $_POST['delete_livro']);
        
        $sql = "DELETE FROM livro WHERE id_livro = '$livro_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Livro Deletado com Sucesso!';
            header('Location: ../ADMINISTRADOR/adm-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Livro Não Foi Deletado!: ' . mysqli_error($conexao);
            header('Location: ../ADMINISTRADOR/adm-index.php');
            exit;
        }
    }

?>