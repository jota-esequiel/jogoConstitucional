<?php
session_start();

$nomeJogadorSessao = isset($_SESSION['nomeJogador']) ? $_SESSION['nomeJogador'] : 'Jogador Desconhecido';

$dados = require 'relatorioFinalController.php';

$acertos = '';
foreach ($dados['jogadoresAcertos'] as $jogador) {
    if ($jogador['nomeJogador'] === $nomeJogadorSessao) {
        $acertos = $jogador['acertos'];
        break;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página com Resultado - MENOS de 3</title>
    <link rel="stylesheet" href="style_3.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        .start-btn {
            background-color: #28a745;
            border: 3px solid #000;
            border-radius: 8px;
            width: 105px;
            height: 60px;
            font-size: 10px;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            display: none;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
        }

        .start-btn:hover {
            background-color: #218838;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">
        <h1 id="typing-text"></h1>
        <a href="inicio.html" class="start-btn">REINICIAR</a>
    </div>
</div>

<script>
    const text = "QUE PENA <?= htmlspecialchars($nomeJogadorSessao) ?>! Você acertou <?= $acertos ?>. Mas não se preocupe, essa é uma oportunidade de aprender ainda mais! Continue praticando e logo você estará dominando o conteúdo. Vamos em frente!";
    let index = 0;
    const speed = 50;

    function typeWriter() {
        if (index < text.length) {
            document.getElementById("typing-text").innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, speed);
        } else {
            document.querySelector('.start-btn').style.display = 'flex';
        }
    }

    window.onload = function() {
        typeWriter();
    };
</script>

</body>
</html>
