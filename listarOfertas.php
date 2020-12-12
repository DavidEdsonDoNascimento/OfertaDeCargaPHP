<?php include_once('cabecalho.php'); ?>
<h1>Suas Ofertas</h1>

<?php
    require_once('./src/DAO/banco.php');
    
    $id = $_GET['id'];


    $sql = "SELECT 
        oferta.id,
        (select nome from cidade c where c.id = oferta.origem_id) origem, 
        (select nome from cidade c where c.id = oferta.destino_id) destino, 
        oferta.produto, 
        oferta.valor, 
        oferta.veiculo, 
        oferta.carroceria, 
        oferta.km, 
        oferta.especie, 
        oferta.rastreado, 
        oferta.obs, 
        (select nomefantasia from pessoa as p where p.id = oferta.ofertante_id) ofertante, 
		oferta.ofertante_id as ofertante_id, 
        (select nomefantasia from pessoa as p where p.id = oferta.prestador_id) prestador, 
		(select telefonepreferencial from pessoa as p where p.id = oferta.ofertante_id) telefonepreferencial,
		(select telefoneopcional1 from pessoa as p where p.id = oferta.ofertante_id) telefoneopcional1,
		(select telefoneopcional2 from pessoa as p where p.id = oferta.ofertante_id) telefoneopcional2,
		(select telefoneopcional3 from pessoa as p where p.id = oferta.ofertante_id) telefoneopcional3,
        oferta.criadoem, 
        oferta.alteradoem, 
        oferta.ativo, 
        oferta.validoate 
        FROM ofertafrete oferta 
        WHERE ofertante_id = :id";

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $pdo->prepare($sql);
    $q->bindValue(":id", $id);
    $result = $q->execute();

 
    $q->execute();
 
    if($q->rowCount() > 0){
        echo '<table class="table table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Origem</th>
            <th scope="col">Destino</th>
            <th scope="col">Produto</th>
            <th scope="col">Valor</th>          
            <th scope="col">Data de Criação</th>          
            <th scope="col">Data de Validade</th>          
            <th scope="col"></th>                  
            </tr>
        </thead>
        <tbody>';

        while($row = $q->fetch(PDO::FETCH_ASSOC)){ 

            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['origem'].'</td>
                    <td>'.$row['destino'].'</td>
                    <td>'.$row['produto'].'</td>
                    <td>'.$row['valor'].'</td>
                    <td>'.date("d/m/Y", strtotime($row['criadoem'])).'</td>
                    <td>'.date("d/m/Y", strtotime($row['validoate'])).'</td>                    
                    <td><a href="detalhesOferta.php?id='.$row['id'].'" class="btn btn-info text-center">Detalhes</a></td>                    
                </tr>
                ';
                
        }
        echo '
                </tbody>
            </table>
            ';


    }
    
    Banco::desconectar();
?>

<?php include_once('rodape.php'); ?>