<?php 

include_once('cabecalho.php'); 
 
if(empty($_SESSION['email']))
    header('location:login.php');
?>
<div class="container" style="margin-top: 15px">
  <div class="jumbotron">
    <h1 class="display-4"><u>Bem vindo</u></h1>
    <p class="lead">
        Este é o <b>Frete Cargas</b>, o sistema para ajudar você transportadora a ofertar suas cargas e
        atingir o maior numero de caminhoneiros possível.
    </p>
    <hr class="my-4">
    <p>Vamos lá, oferte uma carga :)</p>
    <a class="btn btn-success btn-lg" href="cadastrarOfertaDeCarga.php" role="button">Ofertar Nova Oferta</a>
  </div>
</div>
<?php include_once('rodape.php'); ?>