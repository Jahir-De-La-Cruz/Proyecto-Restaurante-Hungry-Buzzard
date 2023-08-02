<?php

    // Conexión a la base de datos
    include 'conexion.php';

    // Campos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];

    // Verificar que no exista el correo o número más de una vez
    $verificar_solicitud = mysqli_query($conexion, "SELECT * FROM registro_solicitud WHERE Correo = '$correo' 
    AND Telefono = '$telefono' ");
    
    if (mysqli_num_rows($verificar_solicitud) > 0) {
        // Si el correo y/o número ya están siendo revisados, mostrar el mensaje de SweetAlert
        echo json_encode(array('status' => 'error', 'message' => 'Este correo y/o número ya está siendo revisado, inténtelo de nuevo.'));
        exit();
    }

    // Insertar registros en la tabla de la base de datos
    $query = "INSERT INTO registro_solicitud (Nombre, Apellido, Correo, Telefono, Edad) 
              VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$edad')";

    // Comprobar el resultado de envío del formulario
    $comprobar = mysqli_query($conexion, $query);

    if ($comprobar) {
        // Formulario enviado correctamente
        echo json_encode(array('status' => 'success'));
    } else {
        // Error al procesar el formulario
        echo json_encode(array('status' => 'error', 'message' => 'Error: ' . mysqli_error($conexion)));
    }

?>

