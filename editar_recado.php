
<?php
// verificar se o usuário está logado
session_start();



// conectar-se ao banco de dados
include("config.php");

// verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// atualizar os dados do usuário no banco de dados
	$id = $_POST['id'];
	$recado = $_POST['recado'];
	$data = $_POST['data'];

	$sql = "UPDATE tbrecado SET recado='$recado', data='$data' WHERE id=$id";
//var_dump($sql);
//exit();
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Recado atualizado com sucesso');</script>";
	} else {
		echo "Erro ao atualizar recado: " . mysqli_error($conn);
	}

	
	// redirecionar de volta para ao portal
	header("Location: portal.php");
	exit();
} else {
	// exibir o formulário preenchido com os dados do usuário
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbrecado WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$recado = $row['recado'];
	$data = $row['data'];
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./cssnovo/css/editar_recado.css"> 
	<title>Editar cadastro</title>
</head>
<body>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h1>EDITAR RECADO</h1>
    <h2>RECADO</h2>
	<input type="hidden" name="id" id="id"  value="<?php echo $_GET['id']; ?>">
    <textarea name="recado" id="recado" cols="30" rows="10" placeholer="Recado:" ><?php echo $recado; ?></textarea>
    <h2>DATA</h2>
    <input type="text" name="data" id="data" placeholder="Data: " value="<?php echo $data; ?>">
    <br>
    <br>
    <button class="botao">Salvar</button>
    <br>
    <br>
    <button class="botao"><a href="portal.php">Cancelar</a></button>
	</form>
</body>
</html>