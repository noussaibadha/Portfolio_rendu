


document.addEventListener('DOMContentLoaded', function () {
// contact
    document.getElementById("bouton-envoyer").addEventListener("click", function(event) {
        // Récupérer les valeurs des champs
        let nom = document.getElementById("nom").value;
        let email = document.getElementById("email").value;
        let sujet = document.getElementById("sujet").value;
        let message = document.getElementById("message").value;

        // Vérifier si tous les champs sont remplis
        if (nom === "" || email === "" || sujet === "" || message === "") {
            // Afficher le message d'erreur
            let erreurMessage = document.getElementById("erreur-message");
            erreurMessage.style.display = "block";
            // Cacher le message d'erreur après 2 secondes
            setTimeout(function() {
                erreurMessage.style.display = "none";
            }, 2000);
            // Empêcher le formulaire de se soumettre
            event.preventDefault();
        } else {
            document.getElementById("bouton-envoyer").addEventListener("click", function() {
                // Afficher le message de confirmation
                document.getElementById("confirmation-message").style.display = "block";
                // Rafraîchir la page après 2 secondes (2000 millisecondes)
                setTimeout(function() {
                    location.reload();
                }, 2000);
            });
        }
    });



// Cursor

const cursorDot = document.querySelector(".cursor-dot");
const cursorOutline = document.querySelector(".cursor-outline");
window.addEventListener("mousemove", (e) => {
    const posX = e.clientX
    const posY = e.clientY
    cursorDot.style.top = `	${posY}px`;
    cursorDot.style.left = `${posX}px`;
    cursorOutline.style.top = `${posY}px`;
    cursorOutline.style.left = `${posX}px`;
    const isPointerHovered = e.target.classList.contains("pointer");
    // Ajustez la taille en conséquence
    if (isPointerHovered) {
        cursorDot.style.width = "5px";
        cursorDot.style.height = "5px";
        cursorOutline.style.width = "25px";
        cursorOutline.style.height = "25px";

        cursorDot.style.transition = `width 400ms, height 400ms`;
        cursorOutline.style.transition = `width 400ms, height 400ms`;
    } else {
        // Si la souris n'est pas sur un élément avec la classe "pointer", utilisez la taille par défaut
        cursorDot.style.width = "10px";
        cursorDot.style.height = "10px";
        cursorOutline.style.width = "35px";
        cursorOutline.style.height = "35px";


    }
    cursorOutline.animate({
        top: `${posY}px`,
        left: `${posX}px`,
    }, {
        duration: 100,
        fill: "forwards",
        easing: "ease-in-out",
    });

})


//Accueil
const image = document.querySelector('.image'); //declarer une variable pour l'image
const titre = document.querySelector('#dev');  //declarer une variable pour le titre
const titre2 = document.querySelector('#salut');  //declarer une variable pour le titre
const titre3 = document.querySelector('#prenom');  //declarer une variable pour le titre
const txt = document.querySelector('#presentation'); //declarer une variable pour le texte
const btn = document.querySelector('#cv'); //declarer une variable pour le bouton


window.addEventListener('load', () => {
    const TL = gsap.timeline({paused:false}); //
    TL.staggerFrom(image,0.7, {right : 50, opacity : 0, ease: "power2.out"})  //animation de l'image avec un délai de 0.7s et une opacité de 0 à 1 avec un effet de puissance de 2 
    TL.staggerFrom(titre,0.7, {top : -50, opacity : 0, ease: "power2.out"}) //animation du titre avec un délai de 0.7s et une opacité de 0 à 1 avec un effet de puissance de 2
    TL.staggerFrom(titre2,0.7, {top : -50, opacity : 0, ease: "power2.out"}) //animation du titre avec un délai de 0.7s et une opacité de 0 à 1 avec un effet de puissance de 2
    TL.staggerFrom(titre3,0.7, {top : -50, opacity : 0, ease: "power2.out"}) //animation du titre avec un délai de 0.7s et une opacité de 0 à 1 avec un effet de puissance de 2
    TL.staggerFrom(txt,0.7, {top : -50, opacity : 0, ease: "power2.out"}) //animation du texte avec un délai de 0.7s et une opacité de 0 à 1 avec un effet de puissance de 2
    TL.staggerFrom(btn,1, {right : -50, opacity : 0, ease: "power2.out"}) //animation du bouton avec un délai de 1s et une opacité de 0 à 1 avec un effet de puissance de 2
    

    TL.play(); //lancement de l'animation
})


// // La partie A-propos

function openTab(x) {
    let content = document.querySelectorAll(".tabContent");
    let btn = document.querySelectorAll("button");
    for(let i = 0; i < content.length; i++) {
        content[i].style.display = "none";
        btn[i].classList.remove("active");
    }
    //tous les content ont display none
    content[x].style.display = "block";
    btn[x].classList.add("active");
}

function openTab2(x) {
    let content = document.querySelectorAll(".tabContent2");
    let btn = document.querySelectorAll("button");
    for(let i = 0; i < content.length; i++) {
        content[i].style.display = "none";
        btn[i].classList.remove("active");
    }
    //tous les content ont display none
    content[x].style.display = "flex";
    btn[x].classList.add("active");
}


// //mention legale

document.getElementById("toggle-mention").addEventListener("click", function() {
    var textMentionLegales = document.getElementById("text-mention-legales");
    if (textMentionLegales.style.display === "none") {
        textMentionLegales.style.display = "block";
    } else {
        textMentionLegales.style.display = "none";
    }
});


});
