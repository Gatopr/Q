<?php
if (isset($_POST['confirmado'])) {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc = $peso / ($altura * $altura);

    $resultado = "";

    if ($imc < 18.5) {
        $resultado = "Você está no estado de magreza";
    } elseif ($imc >= 18.5 && $imc <= 24.9) {
        $resultado = "Peso normal";
    } elseif ($imc >= 25 && $imc <= 29.9) {
        $resultado = "Você está no estado de Sobrepeso";
    } else {
        $resultado = "Você está no estado de Obesidade";
    }
} else {
    $peso = 0;
    $altura = 0;
    $imc = 0;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
    <link rel="stylesheet" href="/css/calcular_imc.css">
    <link rel="stylesheet" href="/css/menu_navegacao.css">
    <style>
    </style>
</head>

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

<body>
    <form method="POST">
        <h2>Digite seu peso:</h2>
        <input type="number" name="peso" min="40" placeholder="Digite seu Peso" required> <br>

        <h2>Digite sua altura:</h2>
        <input type="number" step="0.010" name="altura" min="1.40" placeholder="Digite sua altura" required> <br> <br>
        <button type="submit" name="confirmado">Gerar Resultado</button>
        <?php if (isset($_POST['confirmado'])) : ?>
            <h3>Resultado:</h3>
            <p><?php echo $resultado; ?></p>
        <?php endif; ?>
    </form>

    <p>O que é IMC? <a href="https://pt.wikipedia.org/wiki/%C3%8Dndice_de_massa_corporal" target="_blank">Saiba mais</a>.</p>

</body>