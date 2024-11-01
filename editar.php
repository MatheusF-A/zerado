<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="fundo"></div>
    <?php require_once("./_menu.php")?>

    <div class="container">
        <form action="">
            <div class="form">

                <h1>Editar Informações</h1><br></br>

                <label for="capa">Capa do Jogo:</label>
                <input type="file" name="capa" id="capa"><br></br>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome"><br></br>

                <label for="plataforma">Plataforma:</label>
                <input type="text" name="plataforma" id="plataforma"><br></br>

                <label for="descricao">Descrição:</label>
                <textarea name="desc" id="desc"></textarea><br></br>
                
                <input type="submit" value="Salvar" class="btnSalvar">
                <input type="reset" value="Limpar" class="btnLimpar">

            </div>
        </form>
    </div>
    
</body>
</html>