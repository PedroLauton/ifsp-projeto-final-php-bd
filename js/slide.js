let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000); // Muda a imagem a cada 3 segundos (3000 milissegundos)
}

// Inicia o slideshow quando a página é carregada
document.addEventListener("DOMContentLoaded", function () {
    showSlides();
});