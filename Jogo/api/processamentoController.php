<?php
session_start();
include_once 'DataComponent.php'; 

if (!isset($_SESSION['nomeJogador'])) {
    header("Location: pagina2.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeJogador = $_SESSION['nomeJogador']; 
    $escolha = $_POST['escolha'];
    $nivel = $_POST['nivel']; 

    try {
        $pdo = bdConnetion(); 

        $sqlJogador = "SELECT idJogador FROM jogadores WHERE nomeJogador = :nomeJogador";
        $stmtJogador = $pdo->prepare($sqlJogador);
        $stmtJogador->bindParam(':nomeJogador', $nomeJogador);
        $stmtJogador->execute();

        $jogador = $stmtJogador->fetch(PDO::FETCH_ASSOC);

        if ($jogador) {
            $idJogador = $jogador['idJogador'];

            $sqlResposta = "INSERT INTO respostas (escolha, idJogador) VALUES (:escolha, :idJogador)";
            $stmtResposta = $pdo->prepare($sqlResposta);
            $stmtResposta->bindParam(':escolha', $escolha);
            $stmtResposta->bindParam(':idJogador', $idJogador);

            if ($stmtResposta->execute()) {
                $paginas = [
                    1 => 'culpada1.php', 
                    2 => 'inocente2.php', 
                    3 => 'inocente3.php', 
                    4 => 'inocente4.php', 
                    5 => 'culpada5.php', 
                    6 => 'culpada6.php'  
                ];

            $respostasCorretas = [
                    1 => 'inocente1.php', 
                    2 => 'culpada2.php', 
                    3 => 'culpada3.php', 
                    4 => 'culpada4.php',  
                    5 => 'inocente5.php', 
                    6 => 'inocente6.php'   
                ];

                if ($nivel <= count($respostasCorretas)) {
                    if ($escolha == '1' && isset($respostasCorretas[$nivel])) {
                        header("Location: " . $respostasCorretas[$nivel]);
                    } elseif ($escolha == '0' && isset($paginas[$nivel])) {
                        header("Location: " . $paginas[$nivel]);
                    } else {
                        header("Location: " . $paginas[$nivel]);
                    }
                }
                exit();
            }
        }
    } catch (PDOException $e) {
        error_log("Erro: " . $e->getMessage());
    }
}
?>
