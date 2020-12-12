<?php 

include_once('cabecalho.php'); 
    
    if(empty($_SESSION['email']))
        header('location:login.php');
?>
<h1>Nova Oferta</h1>
    <div class="container planodefundo">
        <form action="./src/cadastrarOfertaDeCarga.php" method="post">
            <div class="row">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>"/>
                <div class="col-sm-6">
                    <label class="demo-label" for="">Origem:</label>
                    <input type="hidden" name="idOrigem" id="idOrigem"/>
                    <input type="text" name="origem" id="origem" class="form-control"  required/>
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
                
                <div class="col-sm-4">
                    <label for="">Valor:</label>
                    <input type="text" name="valor" class="form-control" required />
                </div>
                <div class="col-sm-2">
                    <label class="demo-label" for="">Km:</label>
                    <input type="text" name="km" class="form-control" required />
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