<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Halloween</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: url('https://img.freepik.com/fotos-premium/fondo-aterrador-espacio-copia_1179130-425193.jpg?semt=ais_hybrid&w=740&q=80') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
            overflow-x: hidden;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: rgba(10, 10, 10, 0.9);
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #b30000;
            margin-bottom: 20px;
        }

        .nav-link {
            color: #fff !important;
            margin-bottom: 10px;
        }

        h1.bloody-text {
            font-size: 60px;
            font-family: 'Creepster', cursive;
            text-align: center;
            color: red;
            text-shadow: 4px 4px 6px #000;
            position: relative;
        }

        h1.bloody-text::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            height: 20px;
            background: red;
            filter: blur(6px);
            bottom: -10px;
        }

        .card {
            background-color: rgba(25, 25, 25, 0.92);
            border: 3px solid crimson;
            transition: transform .3s;
            height: 450px;
        }
        .card:hover {
            transform: scale(1.05);
        }

        .content-wrapper {
            margin-left: 280px;
            padding: 40px;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(40px);
            animation: slideUp 1s forwards;
        }

        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0px); }
        }
        .parallax-section {
            
            background-size: cover;
        }

        .card {
            height: 550px;
        }

            .ghost {
            position: fixed;
            width: 120px;
            height: 120px;
            background: url('https://pngimg.com/d/ghost_PNG52.png') no-repeat center center/contain;
            opacity: 0.6;
            animation: floatGhost 12s linear infinite;
            pointer-events: none;
            z-index: 1000;
        }

        .ghost1 { top: 20%; left: -150px; animation-delay: 0s; }
        .ghost2 { top: 60%; left: -200px; animation-delay: 4s; }
        .ghost3 { top: 35%; left: -180px; animation-delay: 8s; }

        @keyframes floatGhost {
            0% { transform: translateX(0) translateY(0); opacity: 0.2; }
            25% { opacity: 0.7; transform: translateX(40vw) translateY(-20px); }
            50% { transform: translateX(70vw) translateY(10px); opacity: 1; }
            75% { opacity: 0.6; transform: translateX(90vw) translateY(-15px); }
            100% { transform: translateX(110vw) translateY(0); opacity: 0; }
        }
            .profile-img:hover {
            filter: brightness(0.6);
            cursor: pointer;
            position: relative;
        }

        .profile-img:hover::after {
            content: '303';
            font-family: 'FontAwesome';
            position: absolute;
            top: 40%;
            left: 40%;
            font-size: 24px;
            color: #fff;
        }

        .profile-option {
            width: 80px;
            height: 80px;
            margin: 10px;
            border: 2px solid #b30000;
            border-radius: 12px;
            transition: transform 0.3s, border-color 0.3s;
        }

        .profile-option:hover {
            transform: scale(1.1);
            border-color: crimson;
        }
            .profile-container {
            position: relative;
            display: inline-block;
        }

        .profile-img {
            display: block;
        }

        .edit-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(90deg);
            font-size: 30px;
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .profile-container:hover .edit-icon {
            opacity: 1;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet" />
</head>
<body>

    <aside class="sidebar">
        <div class="profile-container"><img src="https://img.icons8.com/emoji/96/skull-emoji.png" alt="profile" class="profile-img"><span class="edit-icon">✎</span></div>
        <h4 class="text-danger">Bienvenido</h4>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">🏚 Inicio</a>
            <a class="nav-link" href="#">🧛 Juegos</a>
            <a class="nav-link" href="#">⚙ Configuración</a>
            <a class="nav-link" href="#">🔓 Logout</a>
        </nav>
    </aside>

<!-- Modal Perfil -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="profileModalLabel">Editar Perfil</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-wrap justify-content-around">
        <img src="https://img.icons8.com/emoji/96/skull-emoji.png" class="profile-option" data-img-id="1" />
        <img src="https://img.icons8.com/emoji/96/ghost-emoji.png" class="profile-option" />
        <img src="https://img.icons8.com/emoji/96/vampire-emoji.png" class="profile-option" />
        <img src="https://img.icons8.com/emoji/96/zombie-emoji.png" class="profile-option" data-img-id="4" />
        
      </div>
    </div>
  </div>
</div>

    <main class="content-wrapper" style="min-height:100vh;">
        <h1 class="bloody-text">🎃 Bienvenido a la noche del terror 🎃</h1>

        <section class="parallax-section d-flex align-items-center" style="min-height:100vh;">
        <div class="container mt-5">
            <div class="row g-5 justify-content-center">

                <div class="col-md-7 fade-in">
                    <div class="card p-4 text-center text-light">
                        <h2>Juego 1</h2>
                        <p>Enfréntate a los espíritus del pasillo.</p>
                    </div>
                </div>

                <div class="col-md-7 fade-in" style="animation-delay: .3s;">
                    <div class="card p-4 text-center text-light">
                        <h2>Juego 2</h2>
                        <p>Descifra el mensaje maldito.</p>
                    </div>
                </div>

                <div class="col-md-7 fade-in" style="animation-delay: .6s;">
                    <div class="card p-4 text-center text-light">
                        <h2>Juego 3</h2>
                        <p>Corre antes de que te encuentren.</p>
                    </div>
                </div>

                <div class="col-md-7 fade-in" style="animation-delay: .9s;">
                    <div class="card p-4 text-center text-light">
                        <h2>Juego 4</h2>
                        <p>La casa no perdona.</p>
                    </div>
                </div>

            </div>
    </section>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const profileImg = document.querySelector('.profile-img');
    profileImg.addEventListener('click', () => {
        const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
        profileModal.show();
    });

    const profileOptions = document.querySelectorAll('.profile-option');
    profileOptions.forEach(option => {
        option.addEventListener('click', () => {
            const imgSrc = option.getAttribute('src');
            profileImg.src = imgSrc;
            const modalInstance = bootstrap.Modal.getInstance(document.getElementById('profileModal'));
            if(modalInstance) modalInstance.hide();
        });
    });
</script>
<script>
    const profileImg = document.querySelector('.profile-img');
    profileImg.addEventListener('click', () => {
        const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
        profileModal.show();
    });
</script>
<div class="ghost ghost1"></div>
<div class="ghost ghost2"></div>
<div class="ghost ghost3"></div>
</body>
</html>
