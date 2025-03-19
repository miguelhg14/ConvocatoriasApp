
        // JavaScript para la funcionalidad de búsqueda
        const searchInput = document.querySelector('.search-bar input');
        searchInput.addEventListener('keyup', function(e) {
            // Aquí iría el código para la búsqueda
            console.log('Buscando: ' + this.value);
        });

        // JavaScript para la navegación de flechas
        const leftArrow = document.querySelectorAll('.nav-arrow')[0];
        const rightArrow = document.querySelectorAll('.nav-arrow')[1];
        const cardsContainer = document.querySelector('.cards-container');

        leftArrow.addEventListener('click', function() {
            cardsContainer.scrollBy({
                left: -220,
                behavior: 'smooth'
            });
        });

        rightArrow.addEventListener('click', function() {
            cardsContainer.scrollBy({
                left: 220,
                behavior: 'smooth'
            });
        });
