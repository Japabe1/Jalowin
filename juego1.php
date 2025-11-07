
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Halloween - Atrapa Calabazas</title>
    <link rel="stylesheet" href="./assets/style/style.css">
</head>
<body class = "body-game1">
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
    </div>
    <div id="instructions">
            Usa las flechas ← → o mueve el ratón para mover al mago
    </div>
    <div id="volver-home">
    <a href="home.php" class="home-btn">🏠 Volver al Inicio</a>
    </div>
    <audio id="screamSound" src="https://www.soundjay.com/human/scream-01.mp3" preload="auto"></audio>
    <script src = "./assets/script/halloween.js"></script>
</body>
</html>
