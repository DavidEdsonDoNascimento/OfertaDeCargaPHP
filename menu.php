<?php 
    if(empty($_SESSION['email'])):                
        include_once('componentes/btn-login.php');
    else:                 
?>
<style>
li{
  margin: 15px;
  color: black;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light sb-navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Frete Cargas</a>
    </div>
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Inicio</a></li>
      <li><a href="cadastrarOfertaDeCarga.php">Cadastrar Nova Oferta <span class="sr-only">(current)</span></a></li>
      <li><a href="listarOfertas.php?id=<?php echo $_SESSION['id'] ?>">Suas Ofertas</a></li>
      <?php if($_SESSION['categoria'] == 1 ): ?>
        <li><a href="gerenciarUsuarios.php">Gerenciamento de usuários</a></li>
      <?php endif; ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="meusDados.php?id=1"><span class="glyphicon glyphicon-user"><?php echo $_SESSION['nome']; ?></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>