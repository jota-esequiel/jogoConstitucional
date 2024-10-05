<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insira Seu Nome</title>
    <link rel="stylesheet" href="style_3.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="content">
            <h1>INSIRA <br> SEU NOME</h1>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once 'DataComponent.php';

                if (isset($_POST['nomeJogador']) && !empty($_POST['nomeJogador'])) {
                    $nomeJogador = $_POST['nomeJogador'];

                    try {
                        $pdo = bdConnetion();
                        $sql = "INSERT INTO jogadores (nomeJogador) VALUES (:nomeJogador)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':nomeJogador', $nomeJogador);

                        if ($stmt->execute()) {
                            session_start();
                            $_SESSION['nomeJogador'] = $nomeJogador;
                            header('Location: pagina3.php');
                        } else {
                            echo "<p style='color:red;'>Erro ao salvar o nome.</p>";
                        }
                    } catch (PDOException $e) {
                        echo "<p style='color:red;'>Erro: " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Por favor, insira um nome válido.</p>";
                }
            }
            ?>

            <form method="POST" action="">
                <input type="text" name="nomeJogador" placeholder="Digite seu nome" class="name-input" required>
                <button type="submit" class="play-btn">▶</button>
            </form>
        </div>
    </div>

</body>
</html>
