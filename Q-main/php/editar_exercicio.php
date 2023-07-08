<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Exercício</title>
	<style>
		body {
			margin: 0;
			font-family: "Roboto", Arial, sans-serif;
			background-image: url("https://th.bing.com/th/id/R.6fb919a79e342539288b0ec884337e55?rik=pknx6EjMmfIHxg&riu=http%3a%2f%2fwww.actionacademia.com.br%2fbackground2.jpg&ehk=0laZVmk3O3KhZYQuOJlHhreCcjEIzycAMyX9zw9DGt4%3d&risl=&pid=ImgRaw&r=0");
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center top;
			background-size: cover;
			height: 100vh;
			background-color: #fff;
		}

		.container {
			margin: 0 auto;
			padding: 10px;
			max-width: 400px;
			text-align: center;
			background-color: rgba(255, 255, 255, 0.7);
			border-radius: 5px;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}

		img {
			width: 100%;
			border-radius: 5px;
		}

		h1,
		h2,
		p,
		h3 {
			color: black;
		}

		.cat {
			color: while;
		}

		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		form label {
			margin-bottom: 5px;
		}

		form input[type="text"],
		form input[type="number"],
		form input[type="submit"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: none;
			background-color: #fff;
		}

		form input[type="submit"] {
			background-color: #4CAF50;
			color: while;
			cursor: pointer;
		}

		a {
			color: green;
		}

	</style>
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

	<div class="container">
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
		<a href="montar_cronograma.php">voltar</a>

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

			echo "<p>Exercício atualizado com sucesso!</p>";
		}
		?>
	</div>
</body>

</html>
