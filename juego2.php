<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Pac-Halloween 🎃</title>

  <!-- 🔸 Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: radial-gradient(circle at top, #080c14, #030508);
      font-family: 'Segoe UI', sans-serif;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255, 120, 0, 0.3);
      padding: 16px;
      text-align: center;
    }
    canvas {
      background: #0a1622;
      border-radius: 8px;
      display: block;
      margin: auto;
    }
    .hud {
      margin-bottom: 8px;
      font-size: 14px;
    }
    button {
      background: #ff7b00;
      border: none;
      color: white;
      border-radius: 6px;
      padding: 8px 12px;
      cursor: pointer;
      font-weight: bold;
    }
    button:hover { background: #ffa733; }

    .btn-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #ff7b00;
      color: white;
      border: none;
      border-radius: 50px;
      padding: 10px 18px;
      font-weight: bold;
      box-shadow: 0 0 10px rgba(255, 120, 0, 0.4);
      transition: 0.2s;
    }
    .btn-float:hover {
      background-color: #ffa733;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="hud">
      Puntuación: <span id="score">0</span> &nbsp;&nbsp;
      Vidas: <span id="lives">3</span>
      <br>
      <button id="startBtn">Iniciar / Reiniciar</button>
    </div>
    <canvas id="game" width="640" height="640"></canvas>
    <p style="font-size:12px;opacity:0.8;margin-top:6px;">
      Controles: Flechas o WASD — Come 🎃, evita 👻, come 🧙‍♀️ para eliminar un fantasma.
    </p>
  </div>

  <a href="home.php" class="btn btn-float">🏠 Volver al inicio</a>

  <script>
  const canvas = document.getElementById('game');
  const ctx = canvas.getContext('2d');
  const TILE = 32, ROWS = 20, COLS = 20;
  const scoreEl = document.getElementById('score');
  const livesEl = document.getElementById('lives');
  const startBtn = document.getElementById('startBtn');

  const rawMap = [
    "22222222222222222222",
    "2..................2",
    "2.2222.22222.2222..2",
    "2.2....2.....2....22",
    "2.2.22.22222.22.2.22",
    "2........2...2....22",
    "22222.2.222.2..22222",
    "2.....2.....2......2",
    "2.22222.22222.222..2",
    "2..................2",
    "2.222.2222222.222..2",
    "2.....2.....2......2",
    "22222.2.222.2.2222.2",
    "2........2.........2",
    "2.2.22.22222.22.2..2",
    "2.2....2.....2.....2",
    "2.2222.22222.2222..2",
    "2..................2",
    "2..................2",
    "22222222222222222222",
  ];

  let map = [];
  let player = {x:1, y:1, dir:{x:0,y:0}, nextDir:{x:0,y:0}};
  let ghosts = [];
  let witches = [];
  let score = 0, lives = 3, pumpkins = 0, running = false;

  const ghostStarts = [ {x:9,y:9},{x:10,y:9},{x:9,y:10},{x:10,y:10} ];

  function resetGame() {
    map = rawMap.map(r => r.split('').map(ch => ch === '2' ? 2 : (ch === '.' ? 1 : 0)));

    player = {x:1, y:1, dir:{x:0,y:0}, nextDir:{x:0,y:0}};
    ghosts = ghostStarts.map(p => ({...p, dir:{x:0,y:0}, stunned:0}));
    witches = [];

    map[player.y][player.x] = 0;

    let pumpkinPositions = [];
    for (let y=0; y<ROWS; y++) for (let x=0; x<COLS; x++) {
      if (map[y][x] === 1) pumpkinPositions.push({x,y});
    }

    // 🧙‍♀️ Solo 2 brujas
    const numWitches = 2;
    for (let i=0; i<numWitches && pumpkinPositions.length>0; i++) {
      const idx = Math.floor(Math.random()*pumpkinPositions.length);
      const pos = pumpkinPositions.splice(idx,1)[0];
      map[pos.y][pos.x] = 0;
      witches.push({x:pos.x, y:pos.y});
    }

    pumpkins = map.flat().filter(c => c===1).length;
    score = 0; lives = 3;
    updateHUD();
    running = true;
  }

  function updateHUD() {
    scoreEl.textContent = score;
    livesEl.textContent = lives;
  }

  function wrap(x, y) {
    if (x < 0) x = COLS - 1;
    if (x >= COLS) x = 0;
    if (y < 0) y = ROWS - 1;
    if (y >= ROWS) y = 0;
    return {x, y};
  }

  function canMove(x, y) {
    const w = wrap(x, y);
    return map[w.y][w.x] !== 2;
  }

  function tryChangeDir() {
    const nd = player.nextDir;
    const next = wrap(player.x + nd.x, player.y + nd.y);
    if (canMove(next.x, next.y)) {
      player.dir = nd;
      player.nextDir = {x:0,y:0};
    }
  }

  // 🧙‍♀️ Comer bruja → eliminar un fantasma
  function eatWitchAndRemoveGhost() {
    if (ghosts.length > 0) {
      const idx = Math.floor(Math.random() * ghosts.length);
      ghosts.splice(idx, 1); // Eliminar un fantasma al azar
    }
  }

  function updatePlayer() {
    tryChangeDir();
    let next = wrap(player.x + player.dir.x, player.y + player.dir.y);
    if (canMove(next.x, next.y)) {
      player = {...player, ...next};
    }

    // 🎃 Comer calabaza
    if (map[player.y][player.x] === 1) {
      map[player.y][player.x] = 0;
      score += 10;
      pumpkins--;
      updateHUD();
      if (pumpkins === 0 && witches.length === 0) {
        running = false; setTimeout(()=>alert("🎉 ¡Ganaste!"),50);
      }
    }

    // 🧙‍♀️ Comer bruja
    const wIndex = witches.findIndex(w => w.x===player.x && w.y===player.y);
    if (wIndex !== -1) {
      witches.splice(wIndex,1);
      score += 50;
      eatWitchAndRemoveGhost(); // 👻 Eliminar fantasma
      updateHUD();
    }
  }

  // 👻 Fantasmas más lentos
let ghostMoveCounter = 0;

function updateGhosts() {
  ghostMoveCounter++;
  if (ghostMoveCounter % 2 !== 0) return; // solo se mueven cada 2 ticks

  for (const g of ghosts) {
    if (g.stunned > 0) { g.stunned--; continue; }
    const dx = player.x - g.x, dy = player.y - g.y;
    const dirs = [{x:1,y:0},{x:-1,y:0},{x:0,y:1},{x:0,y:-1}];
    let move = dirs[Math.floor(Math.random()*dirs.length)];
    if (Math.abs(dx)+Math.abs(dy) < 6 && Math.random()<0.8) {
      move = {x: Math.sign(dx), y: Math.sign(dy)};
    }
    let next = wrap(g.x + move.x, g.y + move.y);
    if (canMove(next.x, next.y)) {
      g.x = next.x; g.y = next.y;
    }
    const w = wrap(g.x, g.y); g.x = w.x; g.y = w.y;
  }
}


  function checkCollisions() {
    for (const g of ghosts) {
      if (g.x===player.x && g.y===player.y) {
        lives--; updateHUD();
        if (lives<=0) { running=false; setTimeout(()=>alert("💀 Game Over"),50); }
        player.x=1; player.y=1;
        for (const gh of ghosts){ gh.x=9; gh.y=9; gh.stunned=0; }
        break;
      }
    }
  }

  function draw() {
    ctx.fillStyle = "#081018";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    for (let r=0; r<ROWS; r++) for (let c=0; c<COLS; c++) {
      const x=c*TILE, y=r*TILE, cell=map[r][c];
      if (cell===2) {
        ctx.fillStyle="#13294b";
        ctx.fillRect(x,y,TILE,TILE);
      } else if (cell===1) {
        ctx.font="16px serif";
        ctx.textAlign="center";
        ctx.textBaseline="middle";
        ctx.fillText("🎃",x+TILE/2,y+TILE/2);
      }
    }
    for (const w of witches) { ctx.font="22px serif"; ctx.fillText("🧙‍♀️",w.x*TILE+TILE/2,w.y*TILE+TILE/2); }
    for (const g of ghosts) { ctx.font="26px serif"; ctx.fillText("👻",g.x*TILE+TILE/2,g.y*TILE+TILE/2); }
    ctx.font="28px serif"; ctx.fillText("😈",player.x*TILE+TILE/2,player.y*TILE+TILE/2);
  }

  window.addEventListener('keydown', e => {
    const k = e.key.toLowerCase();
    if (k==="arrowup"||k==="w") player.nextDir={x:0,y:-1};
    if (k==="arrowdown"||k==="s") player.nextDir={x:0,y:1};
    if (k==="arrowleft"||k==="a") player.nextDir={x:-1,y:0};
    if (k==="arrowright"||k==="d") player.nextDir={x:1,y:0};
  });

  let last=performance.now(), acc=0, tick=160;
  function loop(now){
    const dt=now-last; last=now;
    if(running){ acc+=dt; while(acc>tick){ updatePlayer(); updateGhosts(); checkCollisions(); acc-=tick; } }
    draw(); requestAnimationFrame(loop);
  }

  startBtn.onclick = resetGame;
  resetGame();
  requestAnimationFrame(loop);
  </script>
</body>
</html>
