// Función para mostrar el contenido de la sección seleccionada
function showService(service) {
    // Ocultar todas las secciones
    const services = document.querySelectorAll('.service-content');
    services.forEach(serviceContent => {
        serviceContent.style.display = 'none';
    });

    // Mostrar la sección seleccionada
    document.getElementById(service).style.display = 'block';
}

// Mostrar la sección de limpieza por defecto al cargar la página
window.onload = function() {
    showService('limpieza');
};

document.addEventListener("DOMContentLoaded", function () {
    // Scroll Suave para los enlaces del menú
    document.querySelectorAll('.menu a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault(); // Evita el comportamiento predeterminado del enlace

            const targetId = this.getAttribute('href').substring(1); // Obtiene el ID de la sección destino
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 80, // Ajuste por el menú fijo
                    behavior: 'smooth' // Desplazamiento suave
                });
            }
        });
    });

    // Configuración de ScrollReveal (Fade Up)
    ScrollReveal().reveal('.reveal', {
        duration: 1000,  // Duración de la animación (1s)
        origin: 'bottom', // Aparece desde abajo
        distance: '50px', // Distancia del movimiento
        easing: 'ease-in-out',
        reset: false // Solo se anima la primera vez
    });
});
