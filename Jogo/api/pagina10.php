<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 4</title>
    <link rel="stylesheet" href="style_nivel.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="content">
        <h1 id="typing-text"></h1>
     
        <a href="pagina11.php" class="start-btn" style="display: none;">▶</a>
    </div>
</div>

<script>
    const text = "NIVEL 4";

    let index = 0;
    const speed = 100; 

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
