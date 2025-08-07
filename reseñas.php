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
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    $puntuacion = (int)$_POST['puntuacion']; // Asegúrate de que sea un entero

    // Consulta para insertar la reseña
    $sql = "INSERT INTO reseñas (nombre, email, mensaje, puntuacion) VALUES (?, ?, ?, ?)";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $email, $mensaje, $puntuacion); // 'sssi' indica tipos de datos: string, string, string, integer

 if ($stmt->execute()) {
        // Redirigir a index.php después de insertar la reseña
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al enviar la reseña: " . $stmt->error;
    }
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>
