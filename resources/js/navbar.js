   function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Script para el menú de hamburguesa
    document.getElementById('menu-toggle').onclick = function () {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('scale-y-100');
    };

    // Mostrar/ocultar el navbar en función del scroll
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            navbar.style.transform = "translateY(-100%)";
        } else {
            navbar.style.transform = "translateY(0)";
        }

        lastScrollTop = scrollTop;
    });

    // Mostrar la ventana modal del carrito al pasar el cursor sobre el icono del carrito
    const cartIcon = document.getElementById('cart-icon');
    const cartModal = document.getElementById('cart-modal');

    cartIcon.addEventListener('mouseenter', () => {
        cartModal.classList.remove('hidden');
        cartModal.classList.add('opacity-100', 'scale-100');
    });

    cartIcon.addEventListener('mouseleave', () => {
        cartModal.classList.add('hidden');
        cartModal.classList.remove('opacity-100', 'scale-100');
    });