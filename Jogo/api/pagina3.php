<?php
session_start();

if (isset($_SESSION['nomeJogador'])) {
    $nomeJogador = $_SESSION['nomeJogador'];
} else {
    header("Location: pagina2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com Efeito de Digitação</title>
    <link rel="stylesheet" href="style_3.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="content">
        <h1 id="typing-text"></h1>
        <a href = "pagina4.php"> <button class="start-btn" style="display: none;">▶</button></a> 
    </div>
</div>

<script>
    const nomeJogador = "<?php echo $nomeJogador; ?>";
    const text = nomeJogador + "! Precisamos de sua valiosa ajuda para decidir os casos a seguir. Pedimos que avalie cada situação com base nos princípios constitucionais e nos esclareça qual é a melhor decisão jurídica aplicável a cada um.";

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
