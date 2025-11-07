<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Halloween - Atrapa Calabazas</title>
    <link rel="stylesheet" href="./src/style/style.css">
</head>
<body>
     <div id="gameContainer">
        <div id="gameInfo">
            <div>🎃 Puntos: <span id="score">0</span></div>
            <div>❤️ Vidas: <span id="lives">3</span></div>
        </div>

        <div id="player">🧙</div>

        <div id="gameOver">
            <h2>¡Fin del Juego!</h2>
            <p>Puntuación final: <span id="finalScore">0</span></p>
            <button id="restartBtn">Jugar de Nuevo</button>
        </div>
        <div id="jumpscare"></div>

        <div id="instructions">
            Usa las flechas ← → o mueve el ratón para mover al mago
        </div>
    </div>
    <audio id="screamSound" src="https://www.soundjay.com/human/scream-01.mp3" preload="auto"></audio>
    <script src = "./src/js/halloween.js"></script>
</body>
</html>
<?php