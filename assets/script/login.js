document.addEventListener('DOMContentLoaded', function() {
    const btnShowRegister = document.getElementById('btnShowRegister');
    const btnShowLogin = document.getElementById('btnShowLogin');
    const flipCard = document.querySelector('.flip-card');

    // Mostrar formulario de registro
    if (btnShowRegister) {
        btnShowRegister.addEventListener('click', function(e) {
            e.preventDefault();
            flipCard.classList.add('active');
        });
    }

    // Volver al formulario de login
    if (btnShowLogin) {
        btnShowLogin.addEventListener('click', function(e) {
            e.preventDefault();
            flipCard.classList.remove('active');
        });
    }
});
