const flipCard = document.querySelector(".flip-card");
document.getElementById("btnShowRegister").onclick = () => flipCard.classList.add("active");
document.getElementById("btnShowLogin").onclick = () => flipCard.classList.remove("active");
