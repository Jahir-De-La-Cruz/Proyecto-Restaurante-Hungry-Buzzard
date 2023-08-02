window.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-button');
    const productCards = document.getElementsByClassName('seccion__productos-card-cards');
  
    // Obtener todos los productos
    const allProducts = Array.from(productCards);
  
    // Evento de escucha para el campo de entrada
    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.toLowerCase();
  
      // Filtrar productos según el término de búsqueda
      const filteredProducts = allProducts.filter((product) => {
        const productCategory = product.getAttribute('data-categoria').toLowerCase();
        return productCategory.includes(searchTerm);
      });
  
      // Mostrar los productos filtrados y ocultar los demás
      Array.from(productCards).forEach((product) => {
        if (filteredProducts.includes(product)) {
          product.style.display = 'block';
        } else {
          product.style.display = 'none';
        }
      });
    });
  
    // Evento de escucha para el botón de búsqueda
    searchButton.addEventListener('click', () => {
      const searchTerm = searchInput.value.toLowerCase();
  
      // Filtrar productos según el término de búsqueda
      const filteredProducts = allProducts.filter((product) => {
        const productCategory = product.getAttribute('data-categoria').toLowerCase();
        return productCategory.includes(searchTerm);
      });
  
      // Mostrar los productos filtrados y ocultar los demás
      Array.from(productCards).forEach((product) => {
        if (filteredProducts.includes(product)) {
          product.style.display = 'block';
        } else {
          product.style.display = 'none';
        }
      });
    });
  
    // Evento de escucha para borrar el contenido del campo de entrada
    searchInput.addEventListener('keyup', (event) => {
      if (event.keyCode === 8 && searchInput.value === '') {
        // Mostrar todos los productos nuevamente
        Array.from(productCards).forEach((product) => {
          product.style.display = 'block';
        });
      }
    });
  });
  