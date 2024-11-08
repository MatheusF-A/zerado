<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $id                 = filter_input(INPUT_POST,"id", FILTER_SANITIZE_NUMBER_INT);
        $nome               = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_URL);
        $plataforma         = filter_input(INPUT_POST,"plataforma", FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao          = filter_input(INPUT_POST,"descricao", FILTER_SANITIZE_SPECIAL_CHARS);

        require_once("./conexao/conexao.php");
        $capaant = filter_input(INPUT_POST, "capaant", FILTER_SANITIZE_SPECIAL_CHARS);

        if(!empty($_FILES["capa"]["name"])){
            $capa = uniqid(rand(), false)."-".basename($_FILES["capa"]["name"]);
            $pasta = "./upload/";
            
            $flag = true; // capa foi alterada.

        }else{
            $capa = $capaant;
            $flag = false; //capa não alterada.
        }

        $sql = "UPDATE jogoszerados SET 
                    nome          = :nome,
                    plataforma    = :plataforma,
                    descricao     = :descricao,
                    capa          = :capa
                WHERE idJogo   = :id";

        $comandoSQL = $conexao->prepare($sql);

        $comandoSQL->execute(array(
        ":id"         => $id,
        ":nome"       => $nome,
        ":plataforma" => $plataforma,     
        ":descricao"  => $descricao,
        ":capa"       => $capa)
        );

        if($comandoSQL->rowCount() > 0){

            if ($flag){
                unlink($pasta.$capaant); //apaga a foto anterior;
                move_uploaded_file($_FILES["capa"]["tmp_name"], $pasta.$capa); //envia a nova foto. 
            }
            
            header("location:./visualizar.php");
            exit();
        }    
    }else{
        echo("Erro na Atualização.");
    }
