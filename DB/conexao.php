<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'gerenciamento_biblioteca';

    $conexao = new mysqli($hostname, $username, $password, $db);

    if(!$conexao){
        echo "ERRO AO CONECTAR!!!";
    } else{
        // echo "CONECTADO COM SUCESSO!!!";
    }

?>