<?php
  session_start();
  if(empty($_SESSION)){
    echo"<script> location.href='index.php'; </script>"; 
  }
/*
  include("config.php");
  $recado = mysqli_real_escape_string($conn, $_POST['recado']);
  $data = mysqli_real_escape_string($conn, $_POST['data']);
var_dump($recado);
exit;
 $query = "INSERT INTO tbrecado (recado, data) VALUES ('$recado','$data')";
 $resultado = mysqli_query($conn,$query);

 // Verifica se houve erro na inserção
if (!$resultado) {
  die("Erro ao inserir os dados no MySQL: " . mysqli_error($conexao));
}

// Fecha a conexão com o MySQL
mysqli_close($conn);
*/
  ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="./cssnovo/css/portal.css"> 
    <title>Portal - Usuário Identificado</title>
</head>

<body>

 	<h1>Lista de Recados</h1>
	<table>
		<tr>
			<td>ID</td>
			<td>Recado</td>
			<td>Data</td>
			<td>Ação</td>
		</tr>
		<?php
        include("config.php");
         $sql = "select * from tbrecado";
         $result = $conn->query($sql) or die($conn->error);
		// aqui você deve incluir um script PHP que consulta o banco de dados e retorna a lista de usuários em um loop
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['recado'] . "</td>";
			echo "<td>" . $row['data'] . "</td>";
			echo "<td><a href='editar_recado.php?id=" . $row['id'] . "'>Editar</a> | <a href='excluir_recado.php?id=" . $row['id'] . "'>Excluir</a></td>";
			echo "</tr>";
		}
		?>

	</table>
</body>

</html>
