<?php include_once('cabecalhoLogin.php'); ?>
<?php session_destroy(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Frete Cargas</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="./src/validarAcesso.php" class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">E-mail:</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="email" id="email" placeholder="E-mail" required>
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Senha:</label>
                                    <input type="password" class="form-control form-control-lg rounded-0"  name="senha" id="senha" placeholder="Senha"  autocomplete="new-password" required>
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Acessar</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                    <p class="message" style="color:white">Não possui uma conta? <a href="cadastro.php">Criar uma conta</a></p>
                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->

<?php include_once('rodape.php'); ?>



