<?php
 session_start();
 if(empty($_POST) or (empty($_POST['email'] or (empty($_POST['senha']))))){
    echo"<script>location.href='index.php;'</script>";
 }
include("config.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_md5 = md5($senha);//Criptografa a senha usando MDS//
$sql = "select * from tbrecado where email = '$email' and senha = '$senha_md5'";
$res = $conn->query($sql) or die($conn->error);
$row = $res->fetch_object();
$qtd = $res->num_rows;
if($qtd > 0){
    $_SESSION["email"] = $email;
    $_SESSION["nome"] = $row->nome;
    echo"<script>alert('Usuário e/ou senha incorreto(s)');</script>";
    echo"<script>location.href='index.php;'</script>";
}
?>