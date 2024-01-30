// Définition du sélecteur des liens du menu
const menuLinks = document.querySelectorAll(".menu-link");

// Fonction de soulignement du lien actif
function underlineActiveLink() {
  // Récupération du lien actif
  const activeLink = document.activeElement;

  // Si le lien actif est un lien du menu, on lui applique le style de soulignement
  if (activeLink && activeLink.classList.contains("menu-link")) {
    activeLink.style.textDecoration = "underline";
  }
}

// Initialisation de la fonction
document.addEventListener("click", underlineActiveLink);
