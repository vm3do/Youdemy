const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    // Toggle navigation
    navLinks.classList.toggle('right-0');
    navLinks.classList.toggle('right-[-100%]');
    
    // Toggle hamburger animation
    const spans = hamburger.getElementsByTagName('span');
    spans[0].classList.toggle('rotate-45');
    spans[0].classList.toggle('translate-y-2');
    spans[1].classList.toggle('opacity-0');
    spans[2].classList.toggle('-rotate-45');
    spans[2].classList.toggle('-translate-y-2');
});

// Close menu when clicking a link
document.querySelectorAll('#nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('right-0');
        navLinks.classList.add('right-[-100%]');
        
        // Reset hamburger
        const spans = hamburger.getElementsByTagName('span');
        spans[0].classList.remove('rotate-45', 'translate-y-2');
        spans[1].classList.remove('opacity-0');
        spans[2].classList.remove('-rotate-45', '-translate-y-2');
    });
}); 