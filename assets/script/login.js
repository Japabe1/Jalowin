const flipCard = document.querySelector(".flip-card");
document.getElementById("btnShowRegister").onclick = () => {
    const alertElement = document.querySelector('.alert');
    if (alertElement) alertElement.style.display = 'none';
    flipCard.classList.add("active");
};
document.getElementById("btnShowLogin").onclick = () => {
    const alertElement = document.querySelector('.alert');
    if (alertElement) alertElement.style.display = 'none';
    flipCard.classList.remove("active");
};
