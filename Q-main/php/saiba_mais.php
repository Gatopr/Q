<?php
  // Realize a conexão com o banco de dados
  $servidor = "localhost";
  $usuario = "adim";
  $senha = "1212";
  $banco = "GYMPLANNER";

  $conn = mysqli_connect($servidor, $usuario, $senha, $banco);
 echo "certo  aaaaaaxxxxxxxxxxxx";
  // Verifique se a conexão foi estabelecida corretamente
  if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
  }

  // Inicie a sessão
  session_start();
  echo $_SESSION['email'];

  // Verifique se o email está presente na sessão
  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Consulta para buscar o usuário com base no email
    $consulta = "SELECT foto_perfil FROM usuarios WHERE email = '$email'";
    $resultadoFotoPerfil = mysqli_query($conn, $consulta);
    echo "certo  aaaaaa////////////";
    // Verifique se a consulta retornou resultados
    if (mysqli_num_rows($resultadoFotoPerfil) > 0) {
      $row = mysqli_fetch_assoc($resultadoFotoPerfil);
      $foto_perfil = $row['foto_perfil'];
      echo "certo  aaaaaa";
    } else {
      // Se o usuário não for encontrado, você pode exibir uma imagem padrão ou tratar de outra maneira
      $foto_perfil = "../img/fotos_de_perfil/profile.png";
    }
    mysqli_close($conn); // Feche a conexão com o banco de dados
  }
  echo "certo  aaaaaa----------";
  ?>

<!DOCTYPE html>
<html lang="pt-br">

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
      <a href="conhecimento.php">Sobre</a>
      <a href="gerenciamento.php">gerenciamento</a>
      <a href="perfil_usuario.php">perfil</a>
    </nav>
  </header>

  <main>
    <div class="item">
      <h2>Peito</h2>
      <p>Exercícios para o peito, como supino, são bons para fortalecer e aumentar a massa muscular no peitoral maior, que é um dos principais músculos do tronco. Eles também podem ajudar a melhorar a estabilidade do ombro e a força da parte superior do corpo.</p>
    </div>
    <div class="item">
      <h2>Perna</h2>
      <p>Exercícios para as pernas, como agachamento e leg press, são bons para fortalecer os músculos das coxas, incluindo os quadríceps, glúteos e isquiotibiais. Eles também podem ajudar a melhorar a estabilidade do joelho e a capacidade de levantar e transportar objetos pesados.</p>
    </div>
    <div class="item">
      <h2>Costas</h2>
      <p>Exercícios para as costas, como remada, são bons para fortalecer os músculos das costas, incluindo o latíssimo do dorso, trapézio e romboides. Eles também podem ajudar a melhorar a postura e a prevenir lesões nas costas.</p>
    </div>
    <div class="item">
      <h2>Glúteos</h2>
      <p>Exercícios para os glúteos, como glúteos e abdução de quadril, são bons para fortalecer os músculos das nádegas. Eles também podem ajudar a melhorar a estabilidade pélvica.</p>
    </div>
    <div class="item">
      <h2>Panturrilha</h2>
      <p>Exercícios para a panturrilha, como elevação de panturrilha, são bons para fortalecer os músculos da panturrilha e melhorar a flexibilidade e estabilidade do tornozelo.</p>
    </div>
    <div class="item">
      <h2>Ombros</h2>
      <p>Exercícios para os ombros, como elevação lateral e desenvolvimento de ombro, são bons para fortalecer os músculos dos ombros, incluindo o deltoide e o manguito rotador. Eles também podem ajudar a melhorar a estabilidade do ombro e a prevenir lesões no ombro.</p>
    </div>
    <div class="item">
      <h2>Barriga</h2>
      <p>Exercícios para a barriga, como abdominal e prancha, são bons para fortalecer os músculos abdominais e ajudar a melhorar a postura e a estabilidade do tronco.</p>
    </div>
    <div class="item">
      <h2>Funcional</h2>
      <p>Exercícios funcionais são aqueles que visam melhorar a força, estabilidade e mobilidade do corpo para atividades cotidianas, como agachar, levantar e carregar objetos. Eles podem incluir uma variedade de movimentos, como agachamento com bola, corda de batalha e treinamento de equilíbrio.</p>
    </div>
    <div class="item">
      <h2>Bíceps</h2>
      <p>Exercícios para os bíceps, como rosca direta e rosca scott, são bons para fortalecer os músculos do braço e melhorar a capacidade de levantar e transportar objetos pesados.</p>
    </div>
    <div class="item">
      <h2>Tríceps</h2>
      <p>Exercícios para os tríceps, como tríceps coice e tríceps testa, são bons para fortalecer os músculos do braço e melhorar a capacidade de empurrar objetos pesados.</p>
    </div>
  </main>

</body>

</html>