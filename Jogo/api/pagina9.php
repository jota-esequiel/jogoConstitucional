<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 3 - Escolha</title>
    <link rel="stylesheet" href="style_caso.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="nivel-title">
    Nível 3
</div>

<div class="container">
    <img src="img_n3.jpg" alt="Imagem de fundo" class="bg-image">
    <div class="content">
        <h1 id="typing-text"></h1>
        
        <form method="POST" action="processamentoController.php" style="display: none;" id="choiceForm">
            <input type="hidden" name="nivel" value="3">
            <input type="hidden" name="escolha" id="escolha" value=""> 
        </form>

        <div class="buttons" style="display: none;">
            <button type="button" class="btn green" onclick="enviarEscolha(0)">INOCENTE</button>
            <button type="button" class="btn red" onclick="enviarEscolha(1)">CULPADO</button>
        </div>
    </div>
</div>

<script>
    const text = "Julia e um grupo de colegas decidiram organizar uma manifestação pacífica em um centro comunitário. Após notificarem a autoridade competente, descobriram que outra manifestação já havia sido programada para o mesmo local e horário. Mesmo assim, decidiram seguir com sua manifestação no mesmo local e horário. O grupo da manifestação previamente agendada, ao se sentir prejudicado, denunciou Julia e seus colegas às autoridades.";

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

    function enviarEscolha(value) {
        document.getElementById("escolha").value = value; 
        document.getElementById("choiceForm").submit();
    }

    window.onload = function() {
        typeWriter(); 
    };
</script>

</body>
</html>
