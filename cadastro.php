<?php 
    include_once('cabecalho.php');
?>

<h1>Cadastro de Transportadora</h1>
<div class="row">
    <form  class="col-sm-12" action="src/cadastrar.php" method="post">
        <div class="row">
            <div class="col-sm-10 col-xs-10"></div>
            <div class="col-sm-2 col-xs-2">
                <label for="ativo">
                    Ativo?
                    <input type="checkbox" name="ativo" id="ativo" checked="checked">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-xs-12">
                <label for="">Razão Social:</label>
                <input type="text" class="form-control" name="razaosocial" id="razaosocial">
            </div>
            <div class="col-sm-4 col-xs-12">
                <label for="">Nome Fantasia:</label>
                <input type="text" class="form-control" name="nomefantasia" id="nomefantasia">
            </div>
            <div class="col-sm-3 col-xs-12">
                <label for="">CNPJ:</label>
                <input type="text" class="form-control" name="documento" id="documento">
            </div>
        </div>
                    
        <input type="hidden" name="categoria" id="categoria" value="3">
        
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <label for="">Endereco:</label>
                <textarea name="endereco" id="endereco" class="form-control" cols="30" rows="2"></textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <label for="">Telefone Preferencial:</label>
                <input type="text" class="form-control" name="telefonepreferencial" id="telefonepreferencial">
            </div>
            <div class="col-sm-3 col-xs-12">
                <label for="">Telefone Opcional 1:</label>
                <input type="text" class="form-control" name="telefoneopcional1" id="telefoneopcional1">
            </div>
            <div class="col-sm-3 col-xs-12">
                <label for="">Telefone Opcional 2:</label>
                <input type="text" class="form-control" name="telefoneopcional2" id="telefoneopcional2">
            </div>
            <div class=" col-sm-3 col-xs-12">
                <label for="">Telefone Opcional 3:</label>
                <input type="text" class="form-control" name="telefoneopcional3" id="telefoneopcional3">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <label for="">Obs:</label>
                <textarea name="observacao" id="observacao" class="form-control" cols="30" rows="4"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12">
            <h4>Informações de Acesso</h4>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <label for="">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class=" col-sm-6 col-xs-12">
                <label for="">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
        </div>
        <div class="col-sm-4 col-xs-4">
            <button type="submit" class="btn btn-primary" style="margin-top:15px">Cadastrar</button>
        </div>
    </form>
</div>

<?php include_once('rodape.php'); ?>