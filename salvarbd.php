<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $nome             = filter_input (INPUT_POST,"nome",         FILTER_SANITIZE_SPECIAL_CHARS);
    $plataforma       = filter_input (INPUT_POST,"plataforma",   FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao        = filter_input (INPUT_POST,"descricao",    FILTER_SANITIZE_SPECIAL_CHARS);
    

    if(!empty($_FILES["capa"]["name"])){
        $capa = uniqid(rand(), false)."-".basename($_FILES["capa"]["name"]);
        $pasta = "./upload/";
    }else{
        $capa ="sem-foto.jpg";
    }

    try {
        
        require_once("./conexao/conexao.php");

        $comandoSQL = $conexao->prepare(
        "INSERT INTO jogoszerados
                (capa, 
                nome, 
                plataforma, 
                descricao)
                VALUES 
                (:capa,
                :nome,
                :plataforma,
                :descricao)"
        );

        $comandoSQL->execute (array 
            (":capa"        =>  $capa,
            ":nome"         =>  $nome,
            ":plataforma"   =>  $plataforma,
            ":descricao"    =>  $descricao)
        );

        if($comandoSQL->rowCount() > 0) 
        {
            move_uploaded_file($_FILES["capa"]["tmp_name"], $pasta.$capa);
            header("location:./visualizar.php");
            exit();
        } 
        else
        {
            echo"Erro na Inserção";
        }

    } 
    catch (PDOException $erro) 
    {
        echo "Erro na gravação dos dados.";
        echo $erro;
    }
}
else
{
    echo("Erro na conexão");
}