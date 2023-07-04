<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Exercício</title>
</head>

<body>
	<?php
	session_start();

	$servidor = "localhost";
	$usuario = "adim";
	$senha = "1212";
	$banco = "GYMPLANNER";

	$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

	if (!$conexao) {
		die("Falha na conexão: " . mysqli_connect_error());
	}

	$idExercicio = $_GET["id"];

	$consultaExercicio = "SELECT * FROM exercicios_usuarios WHERE id = '$idExercicio'";
	$resultadoExercicio = mysqli_query($conexao, $consultaExercicio);

	if (mysqli_num_rows($resultadoExercicio) == 1) {
		$exercicio = mysqli_fetch_assoc($resultadoExercicio);

		$categoria = $exercicio["categoria"];
		$nome = $exercicio["nome"];
		$series = $exercicio["series"];
		$repeticoes = $exercicio["repeticao"];
		$tempo = $exercicio["tempo"];
	} else {
		// Exercício não encontrado
		echo "Exercício não encontrado.";
		exit();
	}

	mysqli_close($conexao);
	?>

	<h1>Editar Exercício</h1>

	<form method="post" action="">
		<label for="categoria">Categoria:</label>
		<input type="text" name="categoria" id="categoria" value="<?php echo $categoria; ?>" readonly>

		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" readonly>

		<label for="series">Séries:</label>
		<input type="number" name="series" id="series" value="<?php echo $series; ?>">

		<label for="repeticoes">Repetições:</label>
		<input type="number" name="repeticoes" id="repeticoes" value="<?php echo $repeticoes; ?>">

		<label for="tempo">Tempo:</label>
		<input type="number" name="tempo" id="tempo" value="<?php echo $tempo; ?>">

		<input type="submit" value="Salvar">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$series = $_POST["series"];
		$repeticoes = $_POST["repeticoes"];
		$tempo = $_POST["tempo"];

		$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

		if (!$conexao) {
			die("Falha na conexão: " . mysqli_connect_error());
		}

		$atualizarExercicio = "UPDATE exercicios_usuarios SET series = '$series', repeticao = '$repeticoes', tempo = '$tempo' WHERE id = '$idExercicio'";
		mysqli_query($conexao, $atualizarExercicio);
		mysqli_close($conexao);

		echo "Exercício atualizado com sucesso!";
	}
	?>
</body>

</html>