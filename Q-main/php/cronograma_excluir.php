<?php
	$servidor = "localhost";
	$usuario = "adim";
	$senha = "1212";
	$banco = "GYMPLANNER";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $exercicioId = $_POST['id'];

    // Realize a exclusão no banco de dados
    $sql = "DELETE FROM exercicios_usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $exercicioId);
    $stmt->execute();

    // Verifique se ocorreu algum erro na execução da declaração
    if ($stmt->error) {
        // A exclusão falhou, retorne uma resposta de erro
        echo "Falha ao excluir o exercício: " . $stmt->error;
    } else {
        // Verifique se a exclusão foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // A exclusão foi bem-sucedida, retorne uma resposta de sucesso
            echo "Exercício excluído com sucesso.";
        }
    }
    $stmt->close();
}

$conn->close();
