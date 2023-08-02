<?php

    // conexión a la base de datos
    include 'conexion.php';

    // variables que se usarán
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $productos = $_POST['productos'];
    $precio = $_POST['precio'];
    $metodo_pago = $_POST['metodo_pago'];

    // Consulta preparada para evitar inyección SQL
    $query = "INSERT INTO pedidos (Nombre, Apellido, Email, Telefono, Productos, PrecioTotal, MetodoPago)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        // Asociar los valores a los parámetros de la consulta
        mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $email, $telefono, $productos, $precio, $metodo_pago);

        // Ejecutar la consulta preparada
        if (mysqli_stmt_execute($stmt)) {
            echo 'success'; // Devolver "success" en caso de éxito
        } else {
            echo 'Error al ejecutar la consulta: ' . mysqli_error($conexion);
        }

        // Cerrar la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error al preparar la consulta: ' . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>
