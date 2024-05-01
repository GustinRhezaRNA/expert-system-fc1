document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('click', function() {
            // Toggle class 'bg-info' saat card diklik
            card.classList.toggle('bg-info');
            
            // Dapatkan checkbox terkait dalam card yang diklik
            const checkbox = card.querySelector('.form-check-input');
            
            // Toggle checked state checkbox saat card diklik
            checkbox.checked = !checkbox.checked;
        });
    });
});