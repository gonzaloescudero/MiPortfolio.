window.addEventListener('scroll', function() {
    const background = document.querySelector('.background-move');
    const offset = window.pageYOffset;
    background.style.transform = 'translateY(' + offset * 0.5 + 'px)';
});