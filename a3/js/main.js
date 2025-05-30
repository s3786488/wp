/* General Styles */
document.addEventListener('DOMContentLoaded', () => {
    // Auto-hide flash message after 3 seconds
    const flash = document.querySelector('.flash-success');
    if (flash) {
        setTimeout(() => {
            flash.style.opacity = '0';
            flash.style.transition = 'opacity 0.5s ease';
            setTimeout(() => flash.remove(), 500);
        }, 3000);
    }

    // Highlight active nav link based on URL
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        if (window.location.href.includes(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });

    // Bootstrap Carousel reset fix (prevent animation bug)
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach(c => {
        c.addEventListener('slide.bs.carousel', () => {
            const items = c.querySelectorAll('.carousel-item');
            items.forEach(item => item.classList.remove('active'));
            items[0].classList.add('active');
        });
    });
});
