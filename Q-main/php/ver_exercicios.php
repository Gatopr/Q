<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/menu_navegacao.css">
    <link rel="stylesheet" href="/css/ver_exercicios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
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
    <?php
	$servidor = "localhost";
	$usuario = "adim";
	$senha = "1212";
	$banco = "GYMPLANNER";

    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

    // Verifica se a conexão foi estabelecida corretamente
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Consulta os dados da tabela "exercicios"
    $query = "SELECT * FROM exercicios";
    $resultado = mysqli_query($conn, $query);

    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Obtém os valores das colunas do resultado
            $categoria = $row["categoria"];
            $nome = $row["nome"];
            $series = $row["series"];
            $repeticao = $row["repeticao"];
            $tempo = $row["tempo"];
            $imagem = $row["imagem"];
            $orientacao = $row["orientacao"];


            // Exibe as informações no site usando tags HTML
            echo '<div>';
            echo '<h1>' . $nome . '</h1>';
            echo '<h2> Categoria: ' . $categoria . '</h2>';
            echo '<img width="320px" src="../img/gifs_exercicios/' . $imagem . '" alt="' . $nome . '">';
            echo '<p>Como fazer: ' . $orientacao . '</p>';
            echo '<h3>Series: ' . $series . ' | Repetição: ' . $repeticao . ' | Tempo: ' . $tempo . '</h3>';
            echo '</div>';
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
    ?>

</body>

</html>