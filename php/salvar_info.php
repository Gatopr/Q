<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saber mais</title>
  <link rel="stylesheet" href="/css/saiba_mais.css">
  <link rel="stylesheet" href="/css/menu_navegacao.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="nav-bar">
      <a class="menu-inicial" href="tela_inicial.php">Início</a>
      <a href="montar_cronograma.php">Cronograma</a>
      <a href="ver_exercicios.php">Exercícios</a>
      <a href="calcular_imc.php">IMC</a>
      <a href="perfil_usuario.php"><img src="https://img.wattpad.com/2847a54156b8585551507c322a26d2c58a487e0f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f726350555f6446443230756d76513d3d2d3839303633343438322e313631663730643738383739386364353930343838353933353730302e6a7067?s=fit&w=720&h=720"></a>
    </nav>
  </header>

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

  $email = $_SESSION["email"];

  $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
  $resultado = mysqli_query($conexao, $consulta);

  if (mysqli_num_rows($resultado) == 1) {
    $usuario = mysqli_fetch_assoc($resultado);
  } else {
    header("Location: perfil_usuario.php");
    exit();
  }

  mysqli_close($conexao);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNome = $_POST["nome"];
    $novoEmail = $_POST["email"];
    $novoNascimento = $_POST["nascimento"];
    $novoSexo = $_POST["sexo"];

    $conexao = mysqli_connect($servername, $username, $password, $dbname);
    $update_query = "UPDATE usuarios SET nome = '$novoNome', email = '$novoEmail', nascimento = '$novoNascimento', sexo = '$novoSexo' WHERE email = '$email'";
    mysqli_query($conexao, $update_query);
    mysqli_close($conexao);

    header("Location: perfil_usuario.php");
    exit();
  }
  ?>

</html>