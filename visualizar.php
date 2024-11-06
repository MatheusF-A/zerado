<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos Zerados</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/controle-de-video-game.png" type="image/x-icon">
</head>
<body>

    <?php require_once("./_menu.php") ?>

    <div class="fundo"></div>

        <section class="games-list">
            <?php

            require_once './conexao/conexao.php';
            $query = $conexao->query("SELECT * FROM jogoszerados ORDER BY nome ASC");
            while ($jogo = $query->fetch(PDO::FETCH_ASSOC)) {        
            ?>
            
            <div class="jogo">
                <div class="game-card">
                    <div class="game-image">
                        <img src="./upload/<?= $jogo['capa'];?>" alt="Imagem do jogo">
                    </div>

                    <div class="game-info">
                        <h2><?=($jogo['nome']); ?></h2>
                        <p><strong>Plataforma:</strong> <?=($jogo['plataforma']); ?></p>
                        <p><strong>Zerado em: </strong>
                        <?php 
                            $data_original = $jogo['data'];

                            $data = DateTime::createFromFormat('Y-m-d', $data_original);
                            $data_formatada = $data->format('d/m/Y');
                            echo $data_formatada;
                        ?></p>
                        <p><strong>Descrição:</strong></p>
                        <p class="description"><?=($jogo['descricao']); ?></p>
                    </div>
                </div>
            
                <div class="botoes">
                    <a href="./editar.php?id=<?=$jogo['idJogo'];?>" class="btnEditar">Editar</a>
                    <a href="./excluir.php?id=<?=$jogo['idJogo'];?>"class="btnExcluirView">Excluir</a>
                </div>
            </div>

            <?php } ?>
        </section>
</body>
</html>