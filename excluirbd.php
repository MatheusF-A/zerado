<?php

/*echo ("<pre>");
print_r($_POST);
echo ("<pre>");

echo ("<pre>");
print_r($_FILES);
echo ("<pre>");*/

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id      = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        
        require_once("./conexao/conexao.php");

        $sql = "DELETE FROM jogoszerados WHERE idJogo=:id";

        $comandoSQL = $conexao->prepare($sql);

        $comandoSQL->execute(array(":id" => $id));

        if($comandoSQL->rowCount() > 0){
            header("location:./visualizar.php");
            exit();
        }
        else{
            echo("Erro na atualização dos dados.");
        }

    }else{
        echo("Erro no envio das informações!");
    }