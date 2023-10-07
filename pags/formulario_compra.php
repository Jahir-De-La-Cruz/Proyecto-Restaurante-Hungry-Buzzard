<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/formulario_compra.css?v12">
    <link rel="shortcut icon" href="../assets/img/Logo_Hungry_Buzzard.png" type="image/x-icon">
</head>
<body>

    <header>
        <div class="header__container">
            <div class="header__titulo">
                <img src="../assets/img/Logo_Hungry_Buzzard.png" alt="icono_de_la_tienda">
                <h1>Hungry Buzzard!</h1>
            </div>
            <nav class="header__menu">
                <ul>
                    <li><a href="../index.html">Volver al Inicio</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
        // Obtener los valores de producto y precio desde la URL
        $productos = $_GET['productos'] ?? '';
        $precio = $_GET['precio'] ?? '';
    ?>

    <section class="contenedor__formulario">
        <div class="contenedor__formulario-form">
            <h2>Confirmación de tu compra</h2>
            <img src="../assets/img/logo_didi-food.png" alt="logo-didiFood">
            <form action="../assets/php/procesar__compra.php" method="POST" autocomplete="off" id="tu_formulario">
                <div class="contenedor__formulario-form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Ingresa tu Nombre" required>
                </div>
                <div class="contenedor__formulario-form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" placeholder="Ingresa tu Apellido" required>
                </div>
                <div class="contenedor__formulario-form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Ingresa tu Correo" required>
                </div>
                <div class="contenedor__formulario-form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" placeholder="Ingresa tu Telefono" required>
                </div>
                <div class="contenedor__formulario-form-group">
                    <label for="producto">Producto(s)</label>
                    <input type="text" name="productos" value="<?php echo htmlspecialchars($_GET['productos'] ?? ''); ?>" readonly>
                </div>
                <div class="contenedor__formulario-form-group">
                    <label for="precio">Precio Total</label>
                    <input type="text" name="precio" value="<?php echo htmlspecialchars($_GET['precio'] ?? '0.00'); ?>" readonly>
                </div>
                <div class="contenedor__formulario-form-group">
                    <label for="metodo_pago">Método de Pago (Por ahora solo Efectivo)</label>
                    <input type="text" name="metodo_pago" value="Efectivo" readonly>
                </div>
                <button class="buttons" type="submit">Realizar Compra</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer__contenedor">
            <div class="redes__sociales">
                <h4>Visita Nuestras Redes Sociales</h4>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
            <div class="enlaces__importantes">
                <h4>Enlaces Importantes</h4>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Política y Privacidad</a>
            </div>
            <div class="contacto">
                <h4>Contacto</h4>
                <p>Correo: hungrybuzzard91@gmail.com</p>
                <p>Telefono: 8172564523</p>
            </div>
        </div>
        <span></span>
        <h4 class="footer__titulo-final">&copy; JahirDLC | Este SitioWeb es un proyecto personal, sin fines de venta</h4>
    </footer>

    <script>
        // Función para aplicar el estilo personalizado del scroll
        function applyCustomScroll() {
            const scrollStyle = `
                /* Estilos para el track del scroll (la barra) */
                ::-webkit-scrollbar {
                width: 10px; /* Ancho de la barra */
                }
        
                /* Estilos para el thumb del scroll (el "brazo" que se desplaza) */
                ::-webkit-scrollbar-thumb {
                background-color: #01BF99; /* Color del thumb */
                border-radius: 0px; /* Radio de los bordes del thumb */
                }
            `;
      
            const styleTag = document.createElement("style");
            styleTag.appendChild(document.createTextNode(scrollStyle));
            document.head.appendChild(styleTag);
        }
        // Ejecutar la función cuando el documento esté listo
        document.addEventListener("DOMContentLoaded", applyCustomScroll);
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Agregar un listener para el formulario
            const form = document.getElementById('tu_formulario');
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Evitar el envío del formulario por defecto
                
                // Realizar la solicitud POST mediante Fetch API
                fetch('../assets/php/procesar__compra.php', {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        Swal.fire({
                            title: '¡Compra realizada con éxito!',
                            text: 'Espera tu turno para recibir el producto.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            window.location.href = '../index.html';
                        }) ;
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Ha ocurrido un error al guardar los datos en la base de datos.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error en el servidor.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                });
            });
        });
    </script>
    
</body>
</html>