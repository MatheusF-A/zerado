<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/controle-de-video-game.png" type="image/x-icon">
</head>
<body>

    <div class="fundo"></div>
    <?php 
    require_once("./_menu.php");
    require_once("./verificar-jogo.php")
    ?>

    <div class="container">
        <form action="editarbd.php" method="post" enctype="multipart/form-data">
            <div class="form">

                <h1>Editar Informações</h1>

                <input type="hidden" name="id" id="id" value="<?=$jogo['idJogo'];?>">

                <p><strong>Capa Atual:</strong></p>
                <img src="./upload/<?= $jogo['capa'];?>" alt="Imagem do jogo" class="imagemform"><br>

                <label for="capa"><strong>Alterar Capa</strong></label>
                <input type="file" name="capa" id="capa"><br></br>

                <label for="nome"><strong>Nome:</strong></label>
                <input type="text" name="nome" id="nome" value="<?=$jogo['nome'];?>"><br><br>

                <label for="plataforma"><strong>Plataforma:</strong></label>
                <input type="text" name="plataforma" id="plataforma" value="<?=$jogo['plataforma'];?>"><br><br>

                <label for="descricao"><strong>Descrição:</strong></label>
                <textarea name="descricao" id="descricao"><?= $jogo['descricao'] ?></textarea><br><br>
                
                <input type="submit" value="Salvar" class="btnSalvar">
                <input type="reset" value="Limpar" class="btnLimpar">
            </div>
        </form>
    </div>
</body>
</html>