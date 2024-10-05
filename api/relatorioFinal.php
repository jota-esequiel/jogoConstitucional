<?php
$data = require 'relatorioFinalController.php';

$chartData = $data['chartData'];
$labels = $data['labels'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Acertos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #myPieChart {
            width: 400px;
            height: 400px; 
            margin: auto; 
        }
    </style>
</head>
<body>
    <h1>Relatório de Acertos</h1>
    
    <canvas id="myPieChart"></canvas> 
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Acertos e Erros',
                    data: <?= json_encode($chartData) ?>,
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true 
            }
        });
    </script>

    <h2>Jogadores que mais acertaram</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nome do Jogador</th>
                <th>Acertos</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jogadoresAcertos)): ?>
                <?php foreach ($jogadoresAcertos as $index => $jogador): ?>
                    <tr>
                        <td><?= htmlspecialchars($jogador['nomeJogador']) ?></td>
                        <td><?= htmlspecialchars($jogador['acertos']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhum jogador encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
