<?php

$conexion = new mysqli('localhost', 'root', '', 'autolavado');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener datos del POST
$id_cliente = $_POST['ID_cliente'];
$fecha = $_POST['Fecha'];
$tipo_auto = $_POST['tipo_auto'];
$precio_auto = $_POST['precio_auto'];
$nombre_servicio = $_POST['nombre_servicio'];
$precio_servicio = $_POST['precio_servicio'];
$total = $_POST['total'];

// Insertar en la tabla
$sql = "INSERT INTO Pedidos (ID_cliente, Fecha, tipo_auto, precio_auto, nombre_servicio, precio_servicio, total)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("isssssd", $id_cliente, $fecha, $tipo_auto, $precio_auto, $nombre_servicio, $precio_servicio, $total);
 
if ($stmt->execute()) {
    // Establecer la cookie ID_cliente después de guardar el pedido
    setcookie('ID_cliente', $id_cliente, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    echo 'Pedido insertado correctamente';
} else {
    echo 'Error al insertar el pedido: ' . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
