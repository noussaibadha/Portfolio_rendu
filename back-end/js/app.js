// back_office_script.js

document.addEventListener("DOMContentLoaded", function() {
    checkSession(); // Vérifie la session à chaque chargement de page
});

function checkSession() {
    fetch("/admin/check_session.php", {
        method: "POST",
        credentials: "same-origin"
    })
    .then(response => {
        if(!response.ok) {
            // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
            window.location.href = "/admin/login.html";
        }
    })
    .catch(error => console.error("Erreur lors de la vérification de la session :", error));
}
