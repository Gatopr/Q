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

$id = $_GET["id"];

$excluirExercicioUsuario = "DELETE FROM exercicios_usuarios WHERE id = '$id'";
mysqli_query($conexao, $excluirExercicioUsuario);
mysqli_close($conexao);

header("Location: montar_cronograma.php"); // Replace "index.php" with the appropriate page where your table is located
