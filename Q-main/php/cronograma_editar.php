<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/php/montar_cronograma.php">voltar</a>

    <br>

    <?php
    session_start();

    if (isset($_SESSION['usuario_id'])) {
        $usuarioLogadoId = $_SESSION['usuario_id'];


        $servidor = "localhost";
        $usuario = "root";
        $senha = "#userVL2023";
        $banco = "gymplanner2";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

        if (!$conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
        echo $_SESSION['usuario_id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
            $ideditar = $_POST["editar"];
            $novasSeries = $_POST["series"];
            $novasRepeticoes = $_POST["repeticoes"];
            $novoTempo = $_POST["tempo"];

            $query = "UPDATE exercicios_usuarios SET series = ?, repeticoes = ?, tempo = ? WHERE id = ? AND usuario_id = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("iiiii", $novasSeries, $novasRepeticoes, $novoTempo, $ideditar, $usuarioLogadoId);
            $stmt->execute();
            $stmt->close();
        }

        $query = "SELECT * FROM exercicios_usuarios WHERE usuario_id = $usuarioLogadoId";
        $result = $conexao->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row['categoria'] . " ";
                echo $row['nome'] . " ";
                echo '<form method="POST" style="display: inline-block;">';
                echo '<input type="hidden" name="editar" value="' . $row['id'] . '">';
                echo '<input type="number" name="series" value="' . $row['series'] . '" class="tec">';
                echo '<input type="number" name="repeticoes" value="' . $row['repeticoes'] . '" class="tec">';
                echo '<input type="number" name="tempo" value="' . $row['tempo'] . '" class="tec">';
                echo '<button type="submit" class="tec">Editar</button>';
                echo '</form>';
                echo "<br>";
            }
        }

        $conexao->close();
    }
    ?>

</body>

</html>