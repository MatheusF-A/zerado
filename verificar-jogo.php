<?php

require_once("./conexao/conexao.php");

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM jogoszerados WHERE idJogo = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':id' => $id]);
    $jogo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$jogo) {
        echo "Jogo não encontrado.";
        exit();
    }

    return $jogo;
} else {
    echo "ID do jogo não fornecido ou inválido.";
    exit();
}