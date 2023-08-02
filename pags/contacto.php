<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Hungry Buzzard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/contacto.css">
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
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="menu_principal.html">Menú</a></li>
                    <li><a href="menu_vegano.html">Veganos</a></li>
                    <li><a href="bebidas.html">Bebidas</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <div class="header__info">
            <div class="header__info-textos">
                <h2>Tienes alguna duda? Contactanos</h2>
                <h4>Excelente atención a clientes, respuestas en menos de 24hrs!</h4>
            </div>
        </div>
    </header>

    <main>
        <section class="contenedor__formulario">
            <div class="contenedor__formulario-form">
                <h2>Contacta directo a hungrybuzzard91@gmail.com</h2>
                <form action="../assets/php/enviar__correo.php" method="POST" autocomplete="off">
                    <div class="contenedor__formulario-form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="Ingresa tu Nombre">
                    </div>
                    <div class="contenedor__formulario-form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Ingresa tu Correo">
                    </div>
                    <div class="contenedor__formulario-form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" name="asunto" placeholder="Motivo de Contacto">
                    </div>
                    <div class="contenedor__formulario-form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea name="mensaje" cols="30" rows="5" required></textarea><br>
                    </div>
                    <button class="buttons" type="submit">Enviar Mensaje</button>
                </form>
            </div>
            <div class="contenedor__seccion-comentarios">
                <div class="seccion__comentarios-title">
                    <h2>Sección de Comentarios</h2>
                    <h4>Aquí en esta sección sientete libre de expresar tu opinión sobre nuestros servicios, así como
                    las sugerencias que tengas.<br><b>Nota:</b> Sean respetuosos con los demás.</h4>
                </div>
            </div>
            <div id="disqus_thread"></div>
        </section>
        <aside class="contenedor__contacto">
            <div class="contenedor__contacto-redes">
                <div class="redes__sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
                <div class="enlaces__importantes">
                    <a href="#">Términos y Condiciones</a>
                    <a href="#">Política y Privacidad</a>
                </div>
                <div class="contacto">
                    <h4>Hungry Buzzard</h4>
                    <p>Correo: hungrybuzzard91@gmail.com</p>
                    <p>Telefono: 8172564523</p>
                </div>
            </div>
        </aside>
    </main>

    <footer>
        <h2>Hungry Buzzard</h2>
        <span></span>
        <h4 class="footer__titulo-final">&copy; JahirDLC | Este SitioWeb es un proyecto personal, sin fines de venta</h4>
    </footer>

    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://https-proyecto-hungry-buzzard-000webhostapp-com.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

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

</body>
</html>