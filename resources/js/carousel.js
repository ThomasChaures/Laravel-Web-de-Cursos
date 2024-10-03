document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#carousel');
    let scrollAmount = 0;
    const logos = carousel.children;
    const logoWidth = logos[0].offsetWidth; // Anchura de un logo
    const totalWidth = logoWidth * logos.length; // Ancho total de los logos

    function scrollContinuously() {
        scrollAmount -= 1; // Ajusta este valor para controlar la velocidad del carrusel
        if (Math.abs(scrollAmount) >= totalWidth) {
            scrollAmount = 0; // Reinicia el desplazamiento cuando llega al final
        }
        carousel.style.transform = `translateX(${scrollAmount}px)`;
    }

    setInterval(scrollContinuously, 20); // Controla la velocidad del desplazamiento
});