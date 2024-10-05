<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 6 - Escolha</title>
    <link rel="stylesheet" href="style_caso.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="nivel-title">
    Nível 6
</div>

<div class="container">
    <img src="img_n6.jpg" alt="Imagem de fundo" class="bg-image">
    <div class="content">
        <h1 id="typing-text"></h1>
        
        <form method="POST" action="processamentoController.php">
            <input type="hidden" name="nivel" value="6"> 
            <input type="hidden" id="escolha" name="escolha" value=""> 

            <div class="buttons" style="display: none;">
                <button type="button" class="btn green" onclick="enviarEscolha(1)">INOCENTE</button>
                <button type="button" class="btn red" onclick="enviarEscolha(0)">CULPADO</button>
            </div>

            <button type="submit" class="submit-btn" style="display:none;">Enviar</button>
        </form>
    </div>
</div>

<script>
    const text = "Paula, uma escritora, publicou um livro de ficção política com críticas duras ao governo local. O conteúdo gerou grande polêmica e descontentamento entre autoridades políticas, que tentaram censurar a obra e impedir sua venda, alegando que ela incitava à desordem social. Paula, por sua vez, defendeu seu direito à liberdade de expressão, afirmando que sua obra era puramente artística e fictícia.";

    let index = 0;
    const speed = 10;

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
        document.querySelector('form').submit(); 
    }

    window.onload = function() {
        typeWriter(); 
    };
</script>

</body>
</html>
