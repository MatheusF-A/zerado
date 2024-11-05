<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogo</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/controle-de-video-game.png" type="image/x-icon">
</head>
<body>

    <div class="fundo"></div>
    <?php require_once("./_menu.php") ?>

    <div class="container">
        <form action="salvarbd.php" method="POST" enctype="multipart/form-data">
            <div class="form">

                <h1>Salvar Jogo</h1><br></br>

                <label for="capa">Capa do Jogo:</label>
                <input type="file" name="capa" id="capa"><br></br>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome"><br></br>

                <label for="plataforma">Plataforma:</label>
                <input type="text" name="plataforma" id="plataforma"><br></br>

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao"></textarea><br></br>
                
                <input type="submit" value="Salvar" class="btnSalvar">
                <input type="reset" value="Limpar" class="btnLimpar">

            </div>
        </form>
    </div>

</body>
</html>