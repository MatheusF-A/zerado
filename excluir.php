<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Jogo</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="fundo"></div>
    <?php require_once("./_menu.php") ?>
    <div class="container">

        <?php
        require_once("./conexao/conexao.php");
        require_once("./verificar-jogo.php")
        ?>

        <form action="excluirbd.php" method="post" enctype="multipart/form-data">
            <div class="form">
                <h1>Excluir Jogo</h1><br>
                <input type="hidden" name="id" id="id" value="<?=$jogo['idJogo'];?>">

                <label for="capa">Capa do Jogo:</label>
                <img src="./upload/<?= $jogo['capa'];?>" alt="Imagem do jogo" class="imagemform"><br>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?=$jogo['nome'];?>" readonly><br><br>

                <label for="plataforma">Plataforma:</label>
                <input type="text" name="plataforma" id="plataforma" value="<?=$jogo['plataforma'];?>" readonly><br><br>

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" readonly><?= $jogo['descricao'] ?></textarea><br><br>
                
                <input type="submit" value="Excluir" class="btnExcluir">
                <input type="reset" value="Limpar" class="btnLimpar">
            </div>
        </form>
    </div>
</body>
</html>
