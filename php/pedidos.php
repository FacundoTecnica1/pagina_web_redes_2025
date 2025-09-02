<?php

include 'conexión.php';

// Inicializar la variable de búsqueda
$search_query = "";
$search_result = null;

// Procesar la búsqueda si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_query = $_POST['search'];
    
    // Consulta para buscar en todas las columnas relevantes
    $sql_search = "SELECT ID_pedido, tipo_auto, nombre_servicio, total, estado FROM Pedidos WHERE ID_pedido LIKE ? OR tipo_auto LIKE ? OR nombre_servicio LIKE ? OR estado LIKE ?";
    
    $stmt_search = $conn->prepare($sql_search);
    $search_param = "%" . $search_query . "%";
    
    $stmt_search->bind_param("ssss", $search_param, $search_param, $search_param, $search_param);
    $stmt_search->execute();
    $search_result = $stmt_search->get_result();
    $stmt_search->close();
}

// Consultar pedidos pendientes
$sql_pendientes = "SELECT ID_pedido, tipo_auto, nombre_servicio, total, estado FROM Pedidos WHERE estado = 'pendiente'";
$result_pendientes = $conn->query($sql_pendientes);

// Consultar pedidos listos
$sql_listos = "SELECT ID_pedido, tipo_auto, nombre_servicio, total, estado FROM Pedidos WHERE estado = 'listo'";
$result_listos = $conn->query($sql_listos);

// Obtener el ID del cliente desde la cookie
$id_cliente_cookie = isset($_COOKIE['ID_cliente']) ? (int)$_COOKIE['ID_cliente'] : null;

// Consultar el pedido del cliente
$pedido_cliente = null;
if ($id_cliente_cookie) {
    $sql_cliente = "SELECT ID_pedido, tipo_auto, nombre_servicio, total, estado FROM Pedidos WHERE ID_cliente = ?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    
    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt_cliente === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt_cliente->bind_param("i", $id_cliente_cookie);
    $stmt_cliente->execute();
    $resultado_cliente = $stmt_cliente->get_result();
    $pedido_cliente = $resultado_cliente->fetch_assoc();
    $stmt_cliente->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #e0f7fa;
        }

        h1 {
            text-align: center;
            color: #00796b;
            margin-bottom: 20px;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 50%;
        }

        .search-container button {
            padding: 10px 15px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .table-container {
            flex: 1;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s;
            min-width: 300px;
        }

        .table-container:hover {
            transform: scale(1.02);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #b2dfdb;
            color: #004d40;
        }

        .pedido-usuario {
            background-color: #ffeb3b;
            color: #000;
        }

        .pedido-otro {
            background-color: #ffffff;
            color: #333;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
        
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #00796b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .btn-container {
            text-align: center;
            margin-top: 20px; /* Separación del botón de las tablas */
        }
    </style>
</head>
<body>

<h1>Gestión de Pedidos</h1>

<div class="search-container">
    <form action="" method="post">
        <input type="text" name="search" placeholder="Buscar por ID, auto, servicio o estado..." value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit"><i class="fas fa-search"></i> Buscar</button>
    </form>
</div>

<div class="container">
    <?php if ($search_result): ?>
        <div class="table-container" style="flex: 2;">
            <h2>Resultados de la Búsqueda</h2>
            <table>
                <tr>
                    <th>ID Pedido</th>
                    <th>Tipo de Auto</th>
                    <th>Servicio</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
                <?php if ($search_result->num_rows > 0): ?>
                    <?php while($row = $search_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["ID_pedido"]; ?></td>
                            <td><?php echo $row["tipo_auto"]; ?></td>
                            <td><?php echo $row["nombre_servicio"]; ?></td>
                            <td><?php echo $row["total"]; ?></td>
                            <td><?php echo $row["estado"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se encontraron resultados.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    <?php else: ?>
        <div class="table-container">
            <h2>Pedidos Pendientes</h2>
            <table>
                <tr>
                    <th>ID Pedido</th>
                    <th>Tipo de Auto</th>
                    <th>Servicio</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
                <?php if ($result_pendientes->num_rows > 0): ?>
                    <?php while($row = $result_pendientes->fetch_assoc()): ?>
                        <tr class="<?php echo ($pedido_cliente && $pedido_cliente['ID_pedido'] == $row['ID_pedido']) ? 'pedido-usuario' : 'pedido-otro'; ?>">
                            <td><?php echo $row["ID_pedido"]; ?></td>
                            <td><?php echo $row["tipo_auto"]; ?></td>
                            <td><?php echo $row["nombre_servicio"]; ?></td>
                            <td><?php echo $row["total"]; ?></td>
                            <td><?php echo $row["estado"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No hay pedidos pendientes.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>

        <div class="table-container">
            <h2>Pedidos Listos</h2>
            <table>
                <tr>
                    <th>ID Pedido</th>
                    <th>Tipo de Auto</th>
                    <th>Servicio</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
                <?php if ($result_listos->num_rows > 0): ?>
                    <?php while($row = $result_listos->fetch_assoc()): ?>
                        <tr class="<?php echo ($pedido_cliente && $pedido_cliente['ID_pedido'] == $row['ID_pedido']) ? 'pedido-usuario' : 'pedido-otro'; ?>">
                            <td><?php echo $row["ID_pedido"]; ?></td>
                            <td><?php echo $row["tipo_auto"]; ?></td>
                            <td><?php echo $row["nombre_servicio"]; ?></td>
                            <td><?php echo $row["total"]; ?></td>
                            <td><?php echo $row["estado"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No hay pedidos listos.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    <?php endif; ?>
</div>

<div class="btn-container">
    <a href="index.php" class="btn">Volver</a>
</div>

</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>