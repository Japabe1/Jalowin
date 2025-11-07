<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Halloween</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/style/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet" />
</head>

<body class="body-home">

   <aside class="sidebar">
        <div class="profile-container"><img src="https://img.icons8.com/emoji/96/skull-emoji.png" alt="profile" class="profile-img"><span class="edit-icon">✎</span></div>
        <h4 class="text-danger">Bienvenido</h4>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">🏚 Inicio</a>
            <a class="nav-link" href="#">🧛 Juegos</a>
            <a class="nav-link" href="#">⚙ Configuración</a>
            <a class="nav-link" href="./src/php/logout.php">🔓 Logout</a>
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
                        <div class="card p-4 text-center text-light" onclick="location.href='juego1.php'">
                            <h2>Run Wizard Run</h2>
                            <img src="https://thumbs.dreamstime.com/b/asistente-de-halloween-con-calabazas-ia-generativa-un-alegre-mago-una-bata-azul-y-sombrero-rodeado-murci%C3%A9lagos-tallados-384020409.jpg" alt="Juego 1" class="img-fluid mb-3" style="width:100%; height:80%; object-fit:cover;" />
                            <p>Atrapalas todas.</p>
                        </div>
                    </div>

                    <div class="col-md-7 fade-in" style="animation-delay: .3s;"onclick="location.href='juego2.php'">
                        <div class="card p-4 text-center text-light">
                            <h2>Pumpkin Man</h2>
                            <img src="https://i.etsystatic.com/60592802/r/il/fff2f0/7236398949/il_fullxfull.7236398949_3o62.jpg" alt="Juego 2" class="img-fluid mb-3" style="width:100%; height:100%; object-fit:cover;" />
                            <p>Eat pumpkins and dodge the ghosts!</p>
                        </div>
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