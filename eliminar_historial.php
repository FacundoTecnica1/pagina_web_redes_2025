<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "autolavado");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el ID del pedido
if (isset($_POST['id'])) {
    $id_pedido = $_POST['id'];

    // Obtener el ID del cliente antes de eliminar el pedido
    $stmt_cliente = $conn->prepare("SELECT ID_cliente FROM Pedidos WHERE ID_pedido = ?");
    $stmt_cliente->bind_param("i", $id_pedido);
    $stmt_cliente->execute();
    $result = $stmt_cliente->get_result();
    $row = $result->fetch_assoc();
    $id_cliente = $row['ID_cliente'];
    $stmt_cliente->close();

    // Preparar la consulta SQL para eliminar el pedido
    $stmt_pedido = $conn->prepare("DELETE FROM Pedidos WHERE ID_pedido = ?");
    $stmt_pedido->bind_param("i", $id_pedido);

    if ($stmt_pedido->execute()) {
        echo "Pedido eliminado con éxito.";

        // Ahora, eliminar al cliente si se encontró
        if ($id_cliente) {
            $stmt_cliente_del = $conn->prepare("DELETE FROM Clientes WHERE ID_cliente = ?");
            $stmt_cliente_del->bind_param("i", $id_cliente);
            if ($stmt_cliente_del->execute()) {
                echo " Cliente con ID " . $id_cliente . " eliminado con éxito.";
            } else {
                echo " Error al eliminar el cliente: " . $conn->error;
            }
            $stmt_cliente_del->close();
        }
    } else {
        echo "Error al eliminar el pedido: " . $conn->error;
    }

    $stmt_pedido->close();
} else {
    echo "ID de pedido no especificado.";
}

$conn->close();
?>