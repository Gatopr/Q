<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações</title>
    <link rel="stylesheet" href="/css/conhecendo.css">
    <link rel="stylesheet" href="/css/menu_navegacao.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            font-family: roboto;
        }

        header {
            display: flex;
            justify-content: center;
        }

        h1 {
            font-weight: 500;
            font-size: 32px;
            margin: 0;
            text-transform: uppercase;
        }

        .imagem-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .imagem-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .nome-exercicio {
            color: white;
            margin-bottom: 10px;
            word-wrap: break-word;
            max-width: 200px; /* Defina o número máximo de caracteres antes de quebrar a linha */
            text-align: center;
        }

        .imagem-card img {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .descricao {
            text-align: center;
        }
    </style>
</head>
<body>
<nav>
    <div class="nav-bar">
        <a class="menu-inicial" href="tela_inicial.php">Início</a>
        <a href="montar_cronograma.php">Cronograma</a>
        <a href="saiba_mais.php">Saiba Mais</a>
        <a href="calcular_imc.php">IMC</a>
    </div>
    <div class="espaco"></div>
</nav>
<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "adim";
$password = "1212";
$dbname = "GYMPLANNER";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para recuperar os dados
$sql = "SELECT imagem, nome, descricao FROM exercicios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop através dos resultados e exibe os dados
    echo '<div class="imagem-container">';
    while ($row = $result->fetch_assoc()) {
        // Obtém o caminho da imagem
        $caminhoImagem = $row["imagem"];
        $nomeExercicio = $row["nome"];
        $descricao = $row["descricao"];

        // Exibe o card do exercício
        echo '<div class="imagem-card">';
        
        // Exibe o nome do exercício
        echo '<div class="nome-exercicio">' . $nomeExercicio . '</div>';

        // Exibe a imagem
        echo '<img src="' . $caminhoImagem . '" alt="Imagem do exercício"/>';

        // Exibe a descrição
        echo '<div class="descricao">' . $descricao . '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

</body>
</html>
