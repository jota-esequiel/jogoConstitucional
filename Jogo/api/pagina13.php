<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nível 5 - Escolha</title>
    <link rel="stylesheet" href="style_caso.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<div class="nivel-title">
    Nível 5
</div>

<div class="container">
    <img src="img_n5.jpg" alt="Imagem de fundo" class="bg-image">
    <div class="content">
        <h1 id="typing-text"></h1>
        
        <form method="POST" action="processamentoController.php" style="display: none;" id="choiceForm">
            <input type="hidden" name="nivel" value="5">
            <input type="hidden" name="escolha" id="escolha" value="">
        </form>

        <div class="buttons" style="display: none;">
            <button type="button" class="btn green" onclick="submitChoice(1)">INOCENTE</button>
            <button type="button" class="btn red" onclick="submitChoice(0)">CULPADO</button>
        </div>
    </div>
</div>

<script>
    const text = "Roberto foi preso por dirigir um patinete elétrico em uma praça pública. As autoridades locais alegaram que ele estava infringindo as regras de trânsito, pois o patinete não estava registrado e ele não tinha habilitação. No entanto, não existia nenhuma lei municipal ou federal que determinasse a obrigatoriedade de registro ou habilitação para conduzir patinetes elétricos.";

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

    function submitChoice(value) {
        document.getElementById("escolha").value = value;
        document.getElementById("choiceForm").submit();
    }

    window.onload = function() {
        typeWriter();
    };
</script>

</body>
</html>
