document.addEventListener('DOMContentLoaded', function () {
    const cartButton = document.querySelector('.header__pedido-icon');
    const cartItemsContainer = document.querySelector('.cart-items-container');
    const cartCloseButton = document.querySelector('.cart-close-button');
    const cartButtonBuy = document.getElementById('cart-button-buy');
    const cartButtonClear = document.getElementById('cart-button-clear');
    const cartItemsTable = document.getElementById('cart-items-table');
    const cartItemsBody = cartItemsTable.getElementsByTagName('tbody')[0];
    const cartTotalPrice = document.getElementById('cart-total-price');

    cartButton.addEventListener('click', toggleCart);
    cartCloseButton.addEventListener('click', toggleCart);

    function toggleCart() {
        cartItemsContainer.classList.toggle('show');
    }

    const addToCartButtons = document.querySelectorAll('.buttons1[type="submit"]');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    // Declarar variable global para almacenar el precio total del carrito
    let totalCartPrice = 0;
    let cartItemsData = []; // Variable para almacenar los datos de los productos en el carrito

    function addToCart(event) {
        const productCard = event.target.closest('.seccion__productos-card-cards');
        const productTitle = productCard.querySelector('.seccion__productos-cards-titulo').textContent;
        const productPrice = parseFloat(productCard.querySelector('.seccion__productos-cards-precio').textContent.replace('$', ''));
        const productImageSrc = productCard.querySelector('.seccion__productos-cards-img').src; // Obtenemos la URL de la imagen

        const cartItem = document.createElement('tr');
        cartItem.innerHTML = `
          <td><img src="${productImageSrc}" alt="Producto" style="max-width: 60px; max-height: 60px;"></td>
          <td>${productTitle}</td>
          <td>$${productPrice.toFixed(2)}</td>
        `;

        cartItemsBody.appendChild(cartItem);
        totalCartPrice += productPrice;
        updateCartTotal();

        // Agregar los datos del producto a la variable cartItemsData
        cartItemsData.push({ productTitle, productPrice });
    }

    function updateCartTotal() {
        cartTotalPrice.textContent = `Precio total: $${totalCartPrice.toFixed(2)}`;
    }

    cartButtonClear.addEventListener('click', clearCart);

    function clearCart() {
        while (cartItemsBody.firstChild) {
            cartItemsBody.removeChild(cartItemsBody.firstChild);
        }
        totalCartPrice = 0;
        updateCartTotal();
        cartItemsData = []; // Limpiar los datos del carrito
    }

    cartButtonBuy.addEventListener('click', () => {
        const cartItems = cartItemsBody.getElementsByTagName('tr');
        if (cartItems.length === 0) {
            Swal.fire({
                title: 'Carrito vacío',
                text: 'El carrito de compras está vacío. Agrega productos antes de realizar la compra.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return;
        }

        // Creamos una cadena con la información de todos los productos
        let productsInfo = '';
        let totalPrice = 0;

        for (let i = 0; i < cartItems.length; i++) {
            const productTitle = cartItems[i].getElementsByTagName('td')[1].textContent;
            const productPrice = parseFloat(cartItems[i].getElementsByTagName('td')[2].textContent.replace('$', ''));

            productsInfo += `${productTitle}, `;
            totalPrice += productPrice;
        }

        // Eliminamos la última coma y espacio de la cadena de productos
        productsInfo = productsInfo.slice(0, -2);

        // Mostramos el mensaje de confirmación con SweetAlert
        Swal.fire({
            title: '¿Estás seguro de realizar la compra?',
            text: 'Una vez confirmada la compra, los productos serán enviados y no podrás deshacer esta acción.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir a formulario_compra.php con los datos en la URL
                const url = `formulario_compra.php?productos=${encodeURIComponent(productsInfo)}&precio=${encodeURIComponent(totalPrice.toFixed(2))}`;
                window.location.href = url;
            }
        });
    });

    // Botones con la clase "buttons2"
    const individualButtons = document.querySelectorAll('.buttons2');
    individualButtons.forEach(button => {
        button.addEventListener('click', buyIndividual);
    });

    function buyIndividual(event) {
        event.preventDefault();

        // Obtener los datos del producto y precio
        const productCard = event.target.closest('.seccion__productos-card-cards');
        const productTitle = productCard.querySelector('.seccion__productos-cards-titulo').textContent;
        const productPrice = parseFloat(productCard.querySelector('.seccion__productos-cards-precio').textContent.replace('$', ''));

        // Mostramos el mensaje de confirmación con SweetAlert
        Swal.fire({
            title: '¿Estás seguro de realizar la compra?',
            text: 'Una vez confirmada la compra, los productos serán enviados y no podrás deshacer esta acción.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir a formulario_compra.php con los datos en la URL
                const url = `formulario_compra.php?productos=${encodeURIComponent(productTitle)}&precio=${encodeURIComponent(productPrice.toFixed(2))}`;
                window.location.href = url;
            }
        });
    }
});