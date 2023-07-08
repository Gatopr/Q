<!DOCTYPE html>
<html>

<head>
    <title>Gerenciamento</title>
    <link rel="stylesheet" href="/css/menu_navegacao.css">
    <link rel="stylesheet" href="/css/gerenciamento.css">
</head>

<body>
    <nav class="nav-bar">
    <a class="menu-inicial" href="tela_inicial.php">Início</a>
      <a href="montar_cronograma.php">Cronograma</a>
      <a href="ver_exercicios.php">Exercícios</a>
      <a href="calcular_imc.php">IMC</a>
      <a href="conhecimento.php">Sobre</a>
      <a href="gerenciamento.php">gerenciamento</a>
      <a href="perfil_usuario.php">perfil</a>
    </nav>
    <main>
        <div class="grid">
            <div>
                <?php
                // Configurações do banco de dados
                $servidor = "localhost";
                $usuario = "adim";
                $senha = "1212";
                $banco = "GYMPLANNER";

                $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
                // Verifica se houve erro na conexão
                if ($conexao->connect_error) {
                    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
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
                    $imagem_dir = "../img/gifs_exercicios/" . $imagem;
                    // Move o arquivo de imagem para o diretório especificado
                    move_uploaded_file($imagem_temp, $imagem_dir);
                    // Insere o novo exercício no banco de dados
                    $sql = "INSERT INTO exercicios (categoria, nome, series, repeticao, tempo, imagem, orientacao)
                                    VALUES ('$categoria', '$nome', '$series', '$repeticao', '$tempo', '$imagem', '$orientacao')";
                    if ($conexao->query($sql) === TRUE) {
                        echo "Exercício adicionado com sucesso!";
                    } else {
                        echo "Erro ao adicionar exercício: " . $conexao->error;
                    }
                }
                // Processa o formulário de remoção de exercício
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remover"])) {
                    $id = $_POST["exercicio_id"];
                    // Remove o exercício do banco de dados
                    $sql = "DELETE FROM exercicios WHERE id = '$id'";
                    if ($conexao->query($sql) === TRUE) {
                    } else {
                        echo "Erro ao remover exercício: " . $conexao->error;
                    }
                }
                // Processa o formulário de edição de exercício
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
                    $categoria = $_POST["categoria"];
                    $nome = $_POST["nome"];
                    $series = $_POST["series"];
                    $repeticao = $_POST["repeticao"];
                    $tempo = $_POST["tempo"];
                    $imagem = $_FILES["imagem"]["name"];
                    $imagem_temp = $_FILES["imagem"]["tmp_name"];
                    $imagem_dir = "../img/gifs_exercicios/" . $imagem;
                    $orientacao = $_POST["orientacao"];
                    // Move o arquivo de imagem para o diretório especificado
                    move_uploaded_file($imagem_temp, $imagem_dir);
                    // Atualiza os dados do exercício no banco de dados
                    $sql = "UPDATE exercicios SET categoria = '$categoria', nome = '$nome', series = '$series',
                                    repeticao = '$repeticao', tempo = '$tempo', imagem = '$imagem', orientacao = '$orientacao' WHERE id = '$id'";
                    if ($conexao->query($sql) === TRUE) {
                        echo "Exercício atualizado com sucesso!";
                    } else {
                        echo "Erro ao atualizar exercício: " . $conexao->error;
                    }
                }
                // Consulta e exibe os exercícios cadastrados
                $sql = "SELECT * FROM exercicios";
                $result = $conexao->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Obtém os valores das colunas do resultado
                        $id = $row["id"];
                        $categoria = $row["categoria"];
                        $nome = $row["nome"];
                        $series = $row["series"];
                        $repeticao = $row["repeticao"];
                        $tempo = $row["tempo"];
                        $imagem = $row["imagem"];
                        $orientacao = $row["orientacao"];
                        echo "<div>";
                        echo "<img width='190px' src='../img/gifs_exercicios/" . $row["imagem"] . "'><br>";
                        echo "<p>ID: " . $row["id"] . "</p>";
                        echo "<p>Categoria: " . $row["categoria"] . "</p>";
                        echo "<p>Nome: " . $row["nome"] . "</p>";
                        echo "<p>Séries: " . $row["series"] . "</p>";
                        echo "<p>Repetições: " . $row["repeticao"] . "</p>";
                        echo "<p>Tempo: " . $row["tempo"] . "</p>";
                        echo "<p>Orientação: " . $row["orientacao"] . "</p>";
                        echo "<form method='POST' action='" . $_SERVER["PHP_SELF"] . "'>";
                        echo "<input type='hidden' name='exercicio_id' value='" . $row["id"] . "'>";
                        echo "<input class='remover' type='submit' name='remover' value='Remover'>";
                        echo '<a class="editar" href="gerenciamento_editar.php?id=' . $id . '">Editar</a>'; // Botão de edição
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "Nenhum exercício cadastrado.";
                }
                // Fecha a conexão com o banco de dados
                $conexao->close();
                ?>
            </div>
            <form class="formulario" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                <h2>Adicionar exercicio</h2>
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
                <label for="orientacao">Orientação:</label>
                <textarea type="text" name="orientacao" required></textarea><br>
                <input type="submit" name="adicionar" value="Adicionar">
            </form>
        </div>
    </main>

</body>

</html>