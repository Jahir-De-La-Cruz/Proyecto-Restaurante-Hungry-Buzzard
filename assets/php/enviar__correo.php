<?php 

    $destinatario = 'hungrybuzzard91@gmail.com';
    //Este es al correo al que se enviara el mensaje

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $header = "Enviado desde la página oficial de Hungry Buzzard";
    $mensajeCompleto = $mensaje . "\nAtentamente " . $nombre;

    mail($destinatario, $asunto, $mensajeCompleto, $header);
    echo '<script> alert("Correo enviado exitosamente") </script>';
    echo "<script> setTimeout(\"location.href='../../pags/contacto.php'\", 1000) </script>";

?>