<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "autolavado");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_cliente = (int)$_POST['id_cliente']; // Obtener ID_cliente del campo oculto
    $mensaje = htmlspecialchars($_POST['mensaje']);
    $puntuacion = (int)$_POST['puntuacion'];

    // Obtener nombre y email del cliente desde la base de datos usando ID_cliente
    $stmt_cliente_info = $conn->prepare("SELECT nombre, correo FROM Clientes WHERE ID_cliente = ?");
    $stmt_cliente_info->bind_param("i", $id_cliente);
    $stmt_cliente_info->execute();
    $result_cliente_info = $stmt_cliente_info->get_result();
    $cliente_info = $result_cliente_info->fetch_assoc();
    $stmt_cliente_info->close();

    if ($cliente_info) {
        $nombre = $cliente_info['nombre'];
        $email = $cliente_info['correo'];

        // Consulta para insertar la reseña
        $sql = "INSERT INTO reseñas (nombre, email, mensaje, puntuacion) VALUES (?, ?, ?, ?)";
        
        // Preparar la consulta
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $email, $mensaje, $puntuacion);

        if ($stmt->execute()) {
            // Redirigir a index.php después de insertar la reseña
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error al enviar la reseña: " . $stmt->error;
        }
        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error: No se encontró información del cliente con el ID proporcionado.";
    }
}

// Cerrar conexión
$conn->close();
?>
