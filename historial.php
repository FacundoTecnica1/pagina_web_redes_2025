<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "autolavado");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para unir las tablas Pedidos y Clientes
$sql = "SELECT p.ID_pedido, p.Fecha, c.nombre AS Nombre, c.modelo_auto AS 'Modelo auto', c.matricula AS Matricula, p.tipo_auto AS 'Tipo de auto', p.precio_auto, p.nombre_servicio, p.precio_servicio, p.total 
        FROM Pedidos p 
        INNER JOIN clientes c ON p.ID_cliente = c.ID_cliente 
        ORDER BY p.Fecha DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #555;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn-borrar {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-borrar:hover {
            background-color: #c82333;
        }
        .btn-volver {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Historial de Pedidos</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table id='tabla-pedidos'>";
            echo "<thead><tr><th>ID Pedido</th><th>Fecha</th><th>Nombre</th><th>Modelo Auto</th><th>Matrícula</th><th>Tipo de Auto</th><th>Precio Auto</th><th>Servicio</th><th>Precio Servicio</th><th>Total</th><th>Eliminar</th></tr></thead>";
            echo "<tbody>";
            // Recorrer los resultados y mostrarlos en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr data-id='" . $row["ID_pedido"] . "'>";
                echo "<td>" . $row["ID_pedido"] . "</td>";
                echo "<td>" . $row["Fecha"] . "</td>";
                echo "<td>" . htmlspecialchars($row["Nombre"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Modelo auto"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Matricula"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Tipo de auto"]) . "</td>";
                echo "<td>$" . htmlspecialchars($row["precio_auto"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nombre_servicio"]) . "</td>";
                echo "<td>$" . htmlspecialchars($row["precio_servicio"]) . "</td>";
                echo "<td>$" . htmlspecialchars($row["total"]) . "</td>";
                echo "<td><button class='btn-borrar' onclick='eliminarPedido(" . $row["ID_pedido"] . ")'>Eliminar</button></td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No hay pedidos registrados.</p>";
        }
        $conn->close();
        ?>
        <a href="index.php" class="btn-volver">Volver al Inicio</a>
    </div>

    <script>
    function eliminarPedido(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este pedido?")) {
            const formData = new FormData();
            formData.append('id', id);

            fetch('eliminar_historial.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                const row = document.querySelector(`tr[data-id='${id}']`); // Si la eliminación fue exitosa, eliminamos la fila de la tabla
                if (row) {
                    row.remove();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al eliminar el pedido.');
            });
        }
    }
    </script>
</body>
</html>