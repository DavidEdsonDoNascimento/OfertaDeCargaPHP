<?php 

include_once('cabecalho.php'); 

require_once('./src/DAO/banco.php');

$id = $_GET['id'];
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM ofertafrete WHERE id = :id limit 1";
$q = $pdo->prepare($sql);
$q->bindValue(":id", $id);
$q->execute();
Banco::desconectar();

if($q->rowCount() > 0){
    $row = $q->fetch(PDO::FETCH_ASSOC);
}else{
    //depois redireciona para tela de lista de ofertas com a mensagem de não encontrado
}



?>


<h1>Editar Oferta</h1>
    <div class="container planodefundo">
        <form action="./src/editarOferta.php" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <label class="demo-label" for="">Origem:</label>
                    <input type="hidden" name="idOrigem" id="idOrigem"/>
                    <input type="text" name="origem" id="origem" class="form-control"  value="<?=$row['origem']?>" required/>
                </div>
                
                <div class="col-sm-6">
                    <label class="demo-label" for="">Destino:</label>
                    <input type="hidden" name="idDestino" id="idDestino"/>
                    <input type="text" name="destino" id="destino" class="form-control"  required/>
                </div>
                
                <div class="col-sm-6">
                    <label class="demo-label" for="">Produto:</label>
                    <input type="text" name="produto" class="form-control" required />
                </div>
                
                <div class="col-sm-6">
                    <label for="">Valor:</label>
                    <input type="text" name="valor" class="form-control" required />
                </div>
                
                <div class="col-sm-6">
                    <label for="">Veiculo:</label>
                    <input type="text" name="veiculo" class="form-control" required />
                </div>
                
                <div class="col-sm-6">
                    <label for="">Carroceria:</label>
                    <input type="text" name="carroceria" class="form-control" required />
                </div>
                
                <div class="col-sm-6">
                    <label for="">Espécie:</label>
                    <input type="text" name="especie" class="form-control" required />
                </div>
                
                <div class="col-sm-6">
                    <label for="">Obs:</label>
                    <input type="text" name="obs" class="form-control" />
                </div>
                <div class="col-sm-12" style="margin-top: 15px">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>               
            </div>
        </form>
    </div>

<?php include_once('rodape.php'); ?>