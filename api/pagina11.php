<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 4 - Escolha</title>
    <link rel="stylesheet" href="style_caso.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="nivel-title">
    Nível 4
</div>

<div class="container">
    <img src="img_n4.jpg" alt="Imagem de fundo" class="bg-image">
    <div class="content">
        <h1 id="typing-text"></h1>
        
        <form method="POST" action="processamentoController.php" id="formEscolha">
            <input type="hidden" name="nivel" value="4">
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
    const text = "Ana, uma jovem de 25 anos, é funcionária de uma empresa e foi impedida de ser promovida a um cargo de gerência. O motivo alegado por seu patrão, Sr. Carlos, foi que, por ser mulher, ela não seria capaz de lidar com o estresse e as responsabilidades de um cargo de liderança. Sentindo-se discriminada, Ana denunciou a empresa e seu patrão por discriminação de gênero.";

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
