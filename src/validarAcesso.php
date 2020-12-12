<?php 
session_start();

require_once('DAO/banco.php');

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM pessoa WHERE email = :email AND senha = :senha and ativo = 1 limit 1";
$q = $pdo->prepare($sql);
$q->bindValue(":email", $email);
$q->bindValue(":senha", $senha);

$q->execute();
Banco::desconectar();

if($q->rowCount() > 0)
{
    $row = $q->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $row['id'];
    $_SESSION['nome'] = $row['nomefantasia'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['categoria'] = $row['categoria'];
    $_SESSION['senha'] = $row['categoria'];
    header('location:../index.php');
}
else
{
    unset ($_SESSION['id']);
    unset ($_SESSION['nome']);
    unset ($_SESSION['email']);
    unset ($_SESSION['categoria']);
    unset ($_SESSION['senha']);
    header('location:../login.php');
}

?>