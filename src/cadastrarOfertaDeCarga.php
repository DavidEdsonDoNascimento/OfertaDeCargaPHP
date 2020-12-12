<?php

    require_once('DAO/banco.php');


    $origem_id = $_POST['idOrigem'];
    $destino_id = $_POST['idDestino'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $veiculo = $_POST['veiculo'];
    $carroceria = $_POST['carroceria'];
    $rastreado = false;
    $especie = $_POST['especie'];
    $obs = $_POST['obs'];
    $km = $_POST['km'];
    $criadoem = date("Y-m-d H:i:s");
    $alteradoem = date("Y-m-d H:i:s");
    $ativo = true;
    $validoate = '2019-12-31 12:00:00';
    $ofertante_id = $_POST['id'];
    
    
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "insert into ofertafrete(origem_id, destino_id, produto, valor, veiculo, carroceria, especie, rastreado, obs, ofertante_id, criadoem, alteradoem, ativo, km,  validoate) values (:origem_id, :destino_id, :produto, :valor, :veiculo, :carroceria, :especie, :rastreado, :obs, :ofertante_id, :criadoem, :alteradoem, :ativo, :km, :validoate)";
    $q = $pdo->prepare($sql);
    
    $q->bindValue(":origem_id", $origem_id);
    $q->bindValue(":destino_id", $destino_id);
    $q->bindValue(":produto", $produto);
    $q->bindValue(":valor", $valor);
    $q->bindValue(":veiculo", $veiculo);
    $q->bindValue(":carroceria", $carroceria);
    $q->bindValue(":especie", $especie);
    $q->bindValue(":rastreado", $rastreado);
    $q->bindValue(":obs", $obs);
    $q->bindValue(":ofertante_id", $ofertante_id);
    $q->bindValue(":criadoem", $criadoem);
    $q->bindValue(":alteradoem", $alteradoem);
    $q->bindValue(":ativo", $ativo);
    $q->bindValue(":km", $km);
    $q->bindValue(":validoate", $validoate);

    $result = $q->execute();
    Banco::desconectar();
    
    if($result){
        header('location:../sucesso.php');
    }else{
        header('location:../erro.php');
    }

?>