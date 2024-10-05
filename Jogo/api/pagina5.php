<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 1 - Escolha</title>
    <link rel="stylesheet" href="style_caso.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="nivel-title">
    Nível 1
</div>

<div class="container">
    <img src="img_n1.jpg" alt="Imagem de fundo" class="bg-image">
    <div class="content">
        <h1 id="typing-text"></h1>
        
        <form method="POST" action="../Jogo/processamentoController.php">
            <input type="hidden" name="nivel" value="1"> 
            <input type="hidden" id="escolha" name="escolha" value=""> 

            <div class="buttons" style="display: none;">
                <button type="button" class="btn green" onclick="enviarEscolha(1)">INOCENTE</button></a>
                <button type="button" class="btn red" onclick="enviarEscolha(0)">CULPADO</button></a>
            </div>

            <button type="submit" class="submit-btn" style="display:none;">Enviar</button>
        </form>
    </div>
</div>

<script>
    const text = "Joana é uma cidadã que decidiu praticar uma religião não reconhecida oficialmente no país. Durante uma reunião em um local reservado, ela realiza cerimônias que envolvem rituais específicos de sua crença. Em uma situação de confronto com um grupo de pessoas que considera esses rituais perturbadores, Joana é denunciada e processada com base em alegações de perturbação da ordem pública.";

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
