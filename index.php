<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autolavado Premium | Limpieza Profesional para tu Vehículo</title>

    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        
        .main-header {
            background-color: #1e3a8a;
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .logo-highlight {
            color: #93c5fd;
        }
        
        .main-nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        
        .main-nav a:hover {
            color: #93c5fd;
        }
        
        
        .hero-section {
            background-color: #1e3a8a;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .hero-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero-highlight {
            color: #93c5fd;
        }
        
        .hero-text {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        
        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn:hover {
            background-color: #1d4ed8;
        }
        
       
        .section {
            padding: 40px 0;
        }
        
        .section-title {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }
        
        .section-title-highlight {
            color: #3b82f6;
        }
        
        .section-subtitle {
            text-align: center;
            color: #666;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        
        .servicios-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        
        .service-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            flex: 1 1 300px;
        }
        
        .service-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #1e3a8a;
        }
        
        .service-description {
            color: #666;
            margin-bottom: 1rem;
        }
        
        .precio {
            color: #2563eb;
            font-weight: bold;
        }
        
        
        .reseñas-section {
            background-color: #f1f5f9;
        }
        
        .reseña-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .reseña-author {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #1e3a8a;
        }
        
        .reseña-text {
            color: #666;
            margin-bottom: 0.5rem;
        }
        
        .reseña-email {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 5px;
            color: #2563eb;
            font-weight: bold;
        }
        
        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        
        .main-footer {
            background-color: #1e293b;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        
        .footer-text {
            margin: 0;
        }
        
        
        .no-reseñas {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    
    <!-- Header y la barra de navegacion -->
    <header class="main-header">
        <div class="container header-content">
            <h1 class="logo">Auto<span class="logo-highlight">Lavado</span>Pro</h1>
            <nav class="main-nav">
                <a href="#inicio">Inicio</a>
                <a href="#servicios">Servicios</a>
                <a href="#reseñas">Reseñas</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section id="inicio" class="hero-section">
        <div class="container">
            <h1 class="hero-title">Lavado Profesional <span class="hero-highlight">Premium</span></h1>
            <p class="hero-text">Transformamos tu vehículo con los mejores productos y técnicas de limpieza profesional</p>
            <a href="registro.html" class="btn">Registrar Auto / Pedir Servicio</a>
        </div>
    </section>

    <!-- Servicios -->
    <section id="servicios" class="section">
        <div class="container">
            <h2 class="section-title">Nuestros <span class="section-title-highlight">Servicios</span></h2>
            <p class="section-subtitle">Ofrecemos una variedad de servicios para mantener tu vehículo impecable</p>
            
            <div class="servicios-container">
                
                <div class="service-card">
                    <img src="Servicio - Lavado simple.jpg" alt="" width="300px" height="250px" style="display: block; margin: 0 auto;">
                    <h3 class="service-title">Lavado Simple</h3>
                    <p class="service-description">Limpieza completa del interior del vehículo.</p>
                    <p class="precio">$20.000</p>
                </div>
                
                
                <div class="service-card">
                    <img src="Servicio - Lavado Plus.jpg" alt="" width="300px" height="250px" style="display: block; margin: 0 auto;">
                    <h3 class="service-title">Lavado Plus</h3>
                    <p class="service-description">Limpieza exterior completa con productos premium.</p>
                    <p class="precio">$25.000</p>
                </div>
                
                
                <div class="service-card">
                    <img src="Servicios - Lavado Completo.png" alt="" width="400px" height="250px" style="display: block; margin: 0 auto;">
                    <h3 class="service-title">Lavado Completo</h3>
                    <p class="service-description">Lavado completo interior y exterior premium.</p>
                    <p class="precio">$40.000</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reseñas de los clientes -->
    <section id="reseñas" class="section reseñas-section">
        <div class="container">
            <h2 class="section-title">Reseñas de Nuestros Clientes</h2>
            <p class="section-subtitle">Lo que dicen nuestros clientes sobre nosotros.</p>
            
            <div>
                <?php
                // Conexión a la base de datos
                $conn = new mysqli("localhost", "root", "", "autolavado");

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta para obtener las reseñas
                $sql = "SELECT nombre, email, mensaje, puntuacion FROM reseñas";
                $result = $conn->query($sql);

                // Verificar si la consulta fue exitosa
                if ($result === false) {
                    die("Error en la consulta: " . $conn->error);
                }

                // Mostrar reseñas
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="reseña-card">';
                        echo '<h3 class="reseña-author">' . htmlspecialchars($row["nombre"]) . '</h3>';
                        echo '<p class="reseña-text">"' . htmlspecialchars($row["mensaje"]) . '"</p>';
                        echo '<p class="reseña-email">Email: ' . htmlspecialchars($row["email"]) . '</p>';
                        echo '<p class="precio">Puntuación: ' . str_repeat('★', $row["puntuacion"]) . str_repeat('☆', 5 - $row["puntuacion"]) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-reseñas">No hay reseñas disponibles.</p>';
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </div>
        </div>
    </section>

    
    <section class="section">
        <div class="container">
            <h2 class="section-title">Deja tu Reseña</h2>
            <p class="section-subtitle">Tu opinión es muy importante para nosotros.</p>
            
            <form action="reseñas.php" method="POST" class="form-container">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Tu Nombre" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="tu.correo@ejemplo.com" required>
                </div>
                <div class="form-group">
                    <label for="mensaje" class="form-label">Comentario:</label>
                    <textarea id="mensaje" name="mensaje" rows="5" class="form-textarea" placeholder="Escribe tu reseña aquí..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="puntuacion" class="form-label">Puntuación:</label>
                    <select id="puntuacion" name="puntuacion" class="form-select" required>
                        <option value="" disabled selected>Selecciona una puntuación</option>
                        <option value="1">1 - Muy Malo</option>
                        <option value="2">2 - Malo</option>
                        <option value="3">3 - Regular</option>
                        <option value="4">4 - Bueno</option>
                        <option value="5">5 - Excelente</option>
                    </select>
                </div>
                <button type="submit" class="btn">Enviar Reseña</button>
            </form>
        </div>
    </section>

   
    <footer class="main-footer">
        <div class="container">
            <p class="footer-text">&copy; 2025 AutoLavadoPro. Todos los derechos reservados. Facundo Noriega y Julian Marengo</p>
        </div>
    </footer>
</body>
</html>
