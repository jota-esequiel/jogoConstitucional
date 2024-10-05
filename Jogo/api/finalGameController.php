<?php
session_start();

$dados = require 'relatorioFinalController.php';

$acertos = 0;

foreach ($dados['jogadoresAcertos'] as $jogador) {
    $acertos = $jogador['acertos'];
    break;
}

if ($acertos <= 3) {
    header("Location: gameOverFalse.php");
} else {
    header("Location: gameOverTrue.php");
}
exit();
?>
