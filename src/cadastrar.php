
<?php 
 
 require_once('DAO/banco.php');
 
 $ativo = $_POST['ativo'];
 $razaosocial = $_POST['razaosocial'];
 $nomefantasia = $_POST['nomefantasia'];
 $documento = $_POST['documento'];
 $endereco = $_POST['endereco'];
 $telefonepreferencial = $_POST['telefonepreferencial'];
 $telefoneopcional1 = $_POST['telefoneopcional1'];
 $telefoneopcional2 = $_POST['telefoneopcional2'];
 $telefoneopcional3 = $_POST['telefoneopcional3'];
 $observacao = $_POST['observacao'];
 $nome = $nomefantasia;
 $email = $_POST['email'];
 $senha = MD5($_POST['senha']);
 $categoria = $_POST['categoria'];
 $criadoem = date("Y-m-d H:i:s");
 $alteradoem = date("Y-m-d H:i:s");
 
 $pdo = Banco::conectar();
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sqlPessoa = "INSERT INTO pessoa (razaosocial, nomefantasia, documento, categoria, endereco, telefonepreferencial, telefoneopcional1, telefoneopcional2, telefoneopcional3, email, senha, ativo, observacao, criadoem, alteradoem) VALUES (:razaosocial, :nomefantasia, :documento, :categoria, :endereco, :telefonepreferencial, :telefoneopcional1, :telefoneopcional2, :telefoneopcional3, :email, :senha, :ativo, :observacao, :criadoem, :alteradoem) ";
 $q = $pdo->prepare($sqlPessoa);


 $q->bindValue(":razaosocial", $razaosocial);
 $q->bindValue(":nomefantasia", $nomefantasia);
 $q->bindValue(":documento", $documento);
 $q->bindValue(":categoria", $categoria);
 $q->bindValue(":endereco", $endereco);
 $q->bindValue(":telefonepreferencial", $telefonepreferencial);
 $q->bindValue(":telefoneopcional1", $telefoneopcional1);
 $q->bindValue(":telefoneopcional2", $telefoneopcional2);
 $q->bindValue(":telefoneopcional3", $telefoneopcional3);
 $q->bindValue(":email", $email);
 $q->bindValue(":senha", $senha);
 $q->bindValue(":ativo", 1);
 $q->bindValue(":observacao", $observacao);
 $q->bindValue(":criadoem", $criadoem);
 $q->bindValue(":alteradoem", $alteradoem);

$result = $q->execute();
 
 echo var_dump($q);
 Banco::desconectar();
 
 if($result)
    header('location:../sucesso.php');
else
    header('location:../erro.php');
 ?>