<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "autolavado";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$modeloauto = $_POST['modeloauto'];
$matricula = $_POST['matricula'];

// Insertar cliente
$stmt = $conn->prepare("INSERT INTO clientes (nombre, correo, modelo_auto, matricula) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $correo, $modeloauto, $matricula);

if ($stmt->execute()) {
    $id_cliente = $stmt->insert_id;
    $_SESSION['ID_cliente'] = $id_cliente;
    
    // Establecer la cookie ID_cliente
    setcookie('ID_cliente', $id_cliente, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    
    echo $id_cliente; // DEVOLVEMOS SOLO el ID
} else {
    echo "0"; // Error
}

$stmt->close();
$conn->close();
?>
