<?php include_once('cabecalho.php'); 

require_once('./src/DAO/banco.php');
    
    $id = $_GET['id'];
    $decisao = isset($_GET['decisao'])? $_GET['decisao'] : '';
    $solicitacao_id = isset($_GET['solicitacao_id'])? $_GET['solicitacao_id'] : '';

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($decisao != '' && $solicitacao_id != ''){
        echo 'entroo';
        $sql = "UPDATE solicitacaofretagem SET status = :decisao  WHERE id = :solicitacao_id";
        $query = $pdo->prepare($sql);
        $query->bindValue(":decisao", $decisao);
        $query->bindValue(":solicitacao_id", $solicitacao_id);
        $result = $query->execute();
        
        $decisao = '';
        $solicitacao_id = '';
    }

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
    oferta.validoate,
    sf.id solicitacao_id,
    sf.prestador_id solicitacao_prestadorid,
    (select nomefantasia from pessoa where id = sf.prestador_id) solicitacao_prestadornomefantasia,
    sf.status solicitacao_status,
    sf.criadoem solicitacao_criadoem
    FROM ofertafrete oferta       
    left join solicitacaofretagem sf on sf.oferta_id = oferta.id 
    WHERE oferta.id = :id";


    

    $q = $pdo->prepare($sql);
    $q->bindValue(":id", $id);
    $result = $q->execute();    
   
?>
<h1>Detalhes da oferta</h1>



<?php


    if($q->rowCount() > 0){
        
        $contador = 0;

        while($row = $q->fetch(PDO::FETCH_ASSOC)){ 
            $contador++;

            if($contador == 1){
                echo '


        <div class="row">                
        <div class="col-sm-6">
            <label class="demo-label" for="">Origem:</label>        
            <input type="text" name="origem" id="origem" class="form-control" value="'.$row['origem'].'" disabled/>
        </div>
        
        <div class="col-sm-6">
            <label class="demo-label" for="">Destino:</label>        
            <input type="text" name="destino" id="destino" class="form-control"  value="'.$row['destino'].'" disabled/>
        </div>
        
        
        <div class="col-sm-6">
            <label class="demo-label" for="">Produto:</label>
            <input type="text" name="produto" class="form-control" value="'.$row['produto'].'" disabled />
        </div>
        
        <div class="col-sm-4">
            <label for="">Valor:</label>
            <input type="text" name="valor" class="form-control" value="'.$row['valor'].'" disabled />
        </div>
        <div class="col-sm-2">
            <label class="demo-label" for="">Km:</label>
            <input type="text" name="km" class="form-control" value="'.$row['km'].'" disabled />
        </div>
        
        <div class="col-sm-6">
            <label for="">Veiculo:</label>
            <input type="text" name="veiculo" class="form-control" value="'.$row['veiculo'].'" disabled />
        </div>
        
        <div class="col-sm-6">
            <label for="">Carroceria:</label>
            <input type="text" name="carroceria" class="form-control" value="'.$row['carroceria'].'" disabled />
        </div>
        
        <div class="col-sm-6">
            <label for="">Espécie:</label>
            <input type="text" name="especie" class="form-control" value="'.$row['especie'].'" disabled />
        </div>
        
        <div class="col-sm-6">
            <label for="">Obs:</label>
            <input type="text" name="obs" class="form-control" value="'.$row['obs'].'" disabled/>
        </div>        
    </div>
    
        <h3 style="margin-top: 15">Solicitações</h3>
        <table class="table table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome do Solicitante</th>
            <th scope="col">Data da Solicitação</th>
            <th scope="col">Status</th>
            <th scope="col">Aceitar</th>          
            <th scope="col">Recusar</th>            
            </tr>
        </thead>
        <tbody>';
            }

            if(isset($row['solicitacao_id'])){

                echo '
                <tr>
                <td>'.$row['solicitacao_id'].'</td>
                <td>'.$row['solicitacao_prestadornomefantasia'].'</td>
                <td>'.date("d/m/Y", strtotime($row['solicitacao_criadoem'])).'</td>
                <td>'.(($row['solicitacao_status'] == 0)? 'Pendente' : (($row['solicitacao_status'] == 1)? 'Aceita': 'Recusada')) .'</td>
                <td>'.(($row['solicitacao_status'] != 0)? '' : '<a href="detalhesOferta.php?id='.$id.'&solicitacao_id='.$row['solicitacao_id'].'&decisao=1" class="btn btn-success">Aceitar</a>').'</td>
                <td>'.(($row['solicitacao_status'] != 0)? '' : '<a href="detalhesOferta.php?id='.$id.'&solicitacao_id='.$row['solicitacao_id'].'&decisao=2" class="btn btn-danger">Recusar</a>').'</td>
                </tr>
                ';
            }
            else{
                echo '<tr></tr>';
            }
                
        }
        echo '
                </tbody>
            </table>
            ';


    }
    
    else{
        echo "Nenhum registro encontrado.";
    }
    
    Banco::desconectar();

    ?>