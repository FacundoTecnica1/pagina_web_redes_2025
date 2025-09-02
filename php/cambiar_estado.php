<?php

include 'conexión.php';

$message = ""; // Variable para almacenar mensajes de éxito o error

// Procesar el cambio de estado si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['estado'])) {
    $id_pedido = (int)$_GET['id'];
    $nuevo_estado = $_GET['estado'];

    // Validar que el estado sea 'listo' o 'pendiente'
    if ($nuevo_estado === 'listo' || $nuevo_estado === 'pendiente') {
        $stmt = $conn->prepare("UPDATE Pedidos SET estado = ? WHERE ID_pedido = ?");
        $stmt->bind_param("si", $nuevo_estado, $id_pedido);

        if ($stmt->execute()) {
            $message = "<div class='alert success'>Estado del pedido ID: $id_pedido cambiado a '$nuevo_estado' con éxito.</div>";
        } else {
            $message = "<div class='alert error'>Error al cambiar el estado del pedido: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        $message = "<div class='alert error'>Estado no válido.</div>";
    }
}

// Consultar todos los pedidos con información del cliente
$sql_pedidos = "
    SELECT 
        p.ID_pedido, 
        c.nombre AS nombre_cliente, 
        c.matricula, 
        p.estado 
    FROM 
        Pedidos p
    JOIN 
        Clientes c ON p.ID_cliente = c.ID_cliente
    ORDER BY p.ID_pedido DESC"; // Ordenar para ver los más recientes primero
$result_pedidos = $conn->query($sql_pedidos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado de Pedidos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #e0f7fa; /* Color suave de fondo */
            color: #333;
        }

        h1 {
            text-align: center;
            color: #00796b; /* Color principal del autolavado */
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff; /* Fondo blanco para el formulario */
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #004d40;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
            box-sizing: border-box; /* Asegura que el padding no aumente el ancho */
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #00796b; /* Color del botón */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border: none;
            cursor: pointer;
            font-size: 1.1em;
            width: 100%; /* Ocupa todo el ancho */
            box-sizing: border-box;
        }

        .btn:hover {
            background-color: #004d40; /* Color del botón al pasar el mouse */
            transform: translateY(-2px);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .alert.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 1.1em;
        }
        .back-link a {
            color: #00796b;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Cambiar Estado de Pedidos</h1>

<div class="container">
    <?php echo $message; // Mostrar mensajes de éxito o error ?>

    <form action="cambiar_estado.php" method="GET">
        <div class="form-group">
            <label for="pedido">Seleccionar Pedido:</label>
            <select name="id" id="pedido" required>
                <option value="">Seleccione un pedido</option>
                <?php if ($result_pedidos->num_rows > 0): ?>
                    <?php while($row = $result_pedidos->fetch_assoc()): ?>
                        <option value="<?php echo $row['ID_pedido']; ?>">
                            <?php echo "ID: " . $row['ID_pedido'] . " - Cliente: " . htmlspecialchars($row['nombre_cliente']) . " - Matrícula: " . htmlspecialchars($row['matricula']) . " - Estado: " . htmlspecialchars($row['estado']); ?>
                        </option>
                    <?php endwhile; ?>
                <?php else: ?>
                    <option value="">No hay pedidos disponibles.</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Nuevo Estado:</label>
            <select name="estado" id="estado" required>
                <option value="listo">Listo</option>
                <option value="pendiente">Pendiente</option>
            </select>
        </div>
        <button type="submit" class="btn">Cambiar Estado</button>
    </form>
</div>

<div class="back-link">
    <a href="pedidos.php">Volver a Pedidos</a>
</div>

</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
