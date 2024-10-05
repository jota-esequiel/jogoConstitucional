<?php

include 'DataComponent.php';

$pdo = bdConnetion(); 

$sql = "SELECT escolha, COUNT(*) as total FROM respostas GROUP BY escolha";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$chartData = [0, 0];
$labels = ['Acertos', 'Erros'];

foreach ($dados as $row) {
    if ($row['escolha'] == 1) {
        $chartData[0] = $row['total']; 
    } else {
        $chartData[1] = $row['total']; 
    }
}

$sqlAcertos = "SELECT 
                    j.nomeJogador,
                    COUNT(r.escolha) AS acertos
                FROM 
                    jogadores j
                LEFT JOIN 
                    respostas r ON j.idJogador = r.idJogador AND r.escolha = 1
                GROUP BY 
                    j.idJogador, j.nomeJogador
                ORDER BY 
                    acertos DESC
                ";

$stmtAcertos = $pdo->prepare($sqlAcertos);
$stmtAcertos->execute();
$jogadoresAcertos = $stmtAcertos->fetchAll(PDO::FETCH_ASSOC);

$pdo = null; 
return [
    'chartData' => $chartData,
    'labels' => $labels
];
