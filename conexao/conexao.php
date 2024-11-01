<?php
    $dns = "mysql:host=localhost;dbname=jogos;charset=utf8";
    $user = "root";
    $pass = "";

    try {

         $conexao = new PDO($dns, $user, $pass);
        
    } catch (PDOException $erro) {
        echo("Erro ao se conectar ao banco de dados");
        exit();
    }