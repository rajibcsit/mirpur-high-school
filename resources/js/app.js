// Homepage hero slider
document.addEventListener('DOMContentLoaded', () => {
    const slides = [...document.querySelectorAll('.hero-slide')];
    const dots = [...document.querySelectorAll('.hero-dot')];
    const next = document.getElementById('hero-next');
    const prev = document.getElementById('hero-prev');
    if (slides.length < 2) return;

    let current = 0;
    const show = (index) => {
        current = (index + slides.length) % slides.length;
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === current);
            slide.classList.toggle('opacity-0', i !== current);
            slide.classList.toggle('pointer-events-none', i !== current);
        });
        dots.forEach((dot, i) => dot.classList.toggle('bg-gold', i === current));
    };
    next?.addEventListener('click', () => show(current + 1));
    prev?.addEventListener('click', () => show(current - 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));
    setInterval(() => show(current + 1), 6000);
});
