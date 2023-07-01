<!DOCTYPE html>
<html>

<head>
    <title>Exercícios</title>
</head>

<body>
    <h1>Exercícios</h1>

    <?php
    // Configurações do banco de dados
    $servername = "localhost";
    $username = "adim";
    $password = "1212";
    $dbname = "GYMPLANNER";

    // Conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se houve erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Processa o formulário de adição de exercício
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionar"])) {
        $categoria = $_POST["categoria"];
        $nome = $_POST["nome"];
        $series = $_POST["series"];
        $repeticao = $_POST["repeticao"];
        $tempo = $_POST["tempo"];
        $imagem = $_FILES["imagem"]["name"];
        $imagem_temp = $_FILES["imagem"]["tmp_name"];
        $imagem_dir = "caminho/para/diretorio/de/imagens/" . $imagem; // Substitua pelo diretório desejado

        // Move o arquivo de imagem para o diretório especificado
        move_uploaded_file($imagem_temp, $imagem_dir);

        // Insere o novo exercício no banco de dados
        $sql = "INSERT INTO exercicios (categoria, nome, series, repeticao, tempo, imagem)
                VALUES ('$categoria', '$nome', '$series', '$repeticao', '$tempo', '$imagem')";

        if ($conn->query($sql) === TRUE) {
            echo "Exercício adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar exercício: " . $conn->error;
        }
    }

    // Processa o formulário de remoção de exercício
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remover"])) {
        $id = $_POST["exercicio_id"];

        // Remove o exercício do banco de dados
        $sql = "DELETE FROM exercicios WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Exercício removido com sucesso!";
        } else {
            echo "Erro ao remover exercício: " . $conn->error;
        }
    }

    // Processa o formulário de edição de exercício
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
        $id = $_POST["exercicio_id"];
        $categoria = $_POST["categoria"];
        $nome = $_POST["nome"];
        $series = $_POST["series"];
        $repeticao = $_POST["repeticao"];
        $tempo = $_POST["tempo"];
        $imagem = $_FILES["imagem"]["name"];
        $imagem_temp = $_FILES["imagem"]["tmp_name"];
        $imagem_dir = "caminho/para/diretorio/de/imagens/" . $imagem; // Substitua pelo diretório desejado

        // Move o arquivo de imagem para o diretório especificado
        move_uploaded_file($imagem_temp, $imagem_dir);

        // Atualiza os dados do exercício no banco de dados
        $sql = "UPDATE exercicios SET categoria = '$categoria', nome = '$nome',
                series = '$series', repeticao = '$repeticao', tempo = '$tempo', imagem = '$imagem'
                WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Exercício atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar exercício: " . $conn->error;
        }
    }

    // Consulta os exercícios no banco de dados
    $sql = "SELECT * FROM exercicios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nome</th>
                    <th>Séries</th>
                    <th>Repetições</th>
                    <th>Tempo</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["categoria"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["series"] . "</td>
                    <td>" . $row["repeticao"] . "</td>
                    <td>" . $row["tempo"] . "</td>
                    <td>" . $row["imagem"] . "</td>
                    <td>
                        <form method='POST' action='" . $_SERVER["PHP_SELF"] . "' enctype='multipart/form-data'>
                            <input type='hidden' name='exercicio_id' value='" . $row["id"] . "'>
                            <input type='submit' name='remover' value='Remover'>
                            <input type='submit' name='editar' value='Editar'>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum exercício encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>

    <h2>Adicionar Exercício</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" required><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="series">Séries:</label>
        <input type="number" name="series" required><br>

        <label for="repeticao">Repetições:</label>
        <input type="number" name="repeticao" required><br>

        <label for="tempo">Tempo:</label>
        <input type="number" name="tempo" required><br>

        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"><br>

        <input type="submit" name="adicionar" value="Adicionar">
    </form>

    <?php
    // Formulário de edição
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
        $id = $_POST["exercicio_id"];

        // Obtém os dados do exercício selecionado
        $sql = "SELECT * FROM exercicios WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>

            <h2>Editar Exercício</h2>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                <input type="hidden" name="exercicio_id" value="<?php echo $row["id"]; ?>">

                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" value="<?php echo $row["categoria"]; ?>" required><br>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $row["nome"]; ?>" required><br>

                <label for="series">Séries:</label>
                <input type="number" name="series" value="<?php echo $row["series"]; ?>" required><br>

                <label for="repeticao">Repetições:</label>
                <input type="number" name="repeticao" value="<?php echo $row["repeticao"]; ?>" required><br>

                <label for="tempo">Tempo:</label>
                <input type="number" name="tempo" value="<?php echo $row["tempo"]; ?>" required><br>

                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem"><br>

                <input type="submit" name="editar" value="Editar">
            </form>
    <?php
        } else {
            echo "Exercício não encontrado.";
        }
    }
    ?>
</body>

</html>