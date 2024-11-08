<?php
require_once("./conexao/conexao.php");

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
} else {
    echo "ID do jogo não fornecido ou inválido.";
    exit();
}

try {
    // Utiliza uma consulta preparada para evitar injeção de SQL
    $sql = "SELECT * FROM jogoszerados WHERE idJogo = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Verifica se o registro foi encontrado
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$dados) {
        echo "Jogo não encontrado.";
        exit();
    }

} catch (PDOException $e) {
    echo "Erro ao se conectar com o banco. " . $e->getMessage();
    exit();
}
