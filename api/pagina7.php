<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 2 - Escolha</title>
    <link rel="stylesheet" href="style_caso.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="nivel-title">
    Nível 2
</div>

<div class="container">
    <img src="img_n2.jpg" alt="Imagem de fundo" class="bg-image">
    <div class="content">
        <h1 id="typing-text"></h1>
        
        <form method="POST" action="processamentoController.php" id="formEscolha">
            <input type="hidden" name="nivel" value="2">
            <input type="hidden" id="escolha" name="escolha" value=""> 

            <div class="buttons" style="display: none;">
                <button type="button" class="btn green" onclick="enviarEscolha(0)">INOCENTE</button>
                <button type="button" class="btn red" onclick="enviarEscolha(1)">CULPADO</button>
            </div>

            <button type="submit" class="submit-btn" style="display:none;">Enviar</button> 
        </form>
    </div>
</div>

<script>
    const text = "Carlos, um senhor de 39 anos, após uma discussão com sua vizinha Marina, de 31 anos, a insultou chamando-a de macaca. Joana, que é negra, decidiu denunciá-lo por injúria racial.";

    let index = 0;
    const speed = 50;

    function typeWriter() {
        if (index < text.length) {
            document.getElementById("typing-text").innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, speed);
        } else {
            document.querySelector('.buttons').style.display = 'flex'; 
        }
    }

    function enviarEscolha(valor) {
        document.getElementById('escolha').value = valor; 
        document.getElementById('formEscolha').submit(); 
    }

    window.onload = function() {
        typeWriter();
    };
</script>

</body>
</html>
