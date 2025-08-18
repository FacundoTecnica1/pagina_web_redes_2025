<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autolavado Premium | Limpieza Profesional</title>
  <link rel="icon" href="favicon.png" type="image/x-icon">

  <style>

    body {
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
      margin: 0;
      background: #f9fafb;
      color: #333;
      line-height: 1.6;
    }

    .container {
      width: 90%;
      max-width: 1100px;
      margin: 0 auto;
    }

    h1, h2, h3 {
      margin: 0 0 15px;
      font-weight: 600;
    }

    /* --- HEADER --- */
    header {
      background: linear-gradient(to right, #1e3a8a, #2563eb);
      color: #fff;
      padding: 15px 0;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    
    header .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.6rem;
      font-weight: bold;
    }

    .logo span {
      color: #fbbf24;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 20px;
      font-size: 0.95rem;
      transition: 0.3s;
    }

    nav a:hover {
      color: #fbbf24;
    }

    /* --- HERO --- */
    .hero {
      background: linear-gradient(135deg, #1e3a8a, #2563eb, #10b981);
      color: #fff;
      text-align: center;
      padding: 80px 20px;
      border-bottom: 6px solid #fbbf24;
    }

    .hero h1 {
      font-size: 2.8rem;
    }

    .hero span {
      color: #fbbf24;
    }

    .hero p {
      font-size: 1.1rem;
      max-width: 600px;
      margin: 15px auto;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      background: #fbbf24;
      color: #1e293b;
      padding: 12px 25px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn:hover {
      background: #d97706;
      color: #fff;
    }

    /* --- SECCIONES --- */
    section {
      padding: 60px 0;
    }
    .section-title {
      text-align: center;
      font-size: 2rem;
      color: #1e3a8a;
      margin-bottom: 10px;
    }
    .section-subtitle {
      text-align: center;
      color: #666;
      margin-bottom: 40px;
    }

    /* --- SERVICIOS --- */
    .servicios {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .card img {
      max-width: 100%;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .precio {
      color: #10b981;
      font-weight: bold;
      margin-top: 10px;
    }

    /* --- RESEÑAS --- */
    .reseñas {
      background: #f1f5f9;
    }
    .reseña {
      background: #fff;
      border-left: 5px solid #2563eb;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      padding: 20px;
      margin-bottom: 20px;
    }
    .reseña h3 {
      color: #1e3a8a;
      margin-bottom: 5px;
    }
    .reseña p {
      margin: 5px 0;
    }
    .stars {
      color: #fbbf24;
    }

    /* --- FORMULARIO --- */
    form {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: #2563eb;
    }
    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-family: inherit;
    }
    button {
      background: #10b981;
      color: #fff;
      padding: 12px 25px;
      border: none;
      border-radius: 30px;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background: #059669;
    }

    /* --- FOOTER --- */
    footer {
      background: #1e293b;
      color: #fff;
      text-align: center;
      padding: 20px;
      font-size: 0.9rem;
    }
    footer span {
      color: #fbbf24;
    }
  </style>

</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="container">
      <div class="logo">Auto<span>Lavado</span>Pro</div>
      <nav>
        <a href="#inicio">Inicio</a>
        <a href="#servicios">Servicios</a>
        <a href="#reseñas">Reseñas</a>
        <a href="historial.php">Historial</a>
      </nav>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero" id="inicio">
    <div class="container">
      <h1>Lavado Profesional <span>Premium</span></h1>
      <p>Transformamos tu vehículo con productos y técnicas de limpieza de alta calidad.</p>
      <a href="registro.html" class="btn">Registrar Auto / Pedir Servicio</a>
    </div>
  </section>

  <!-- SERVICIOS -->
  <section id="servicios">
    <div class="container">
      <h2 class="section-title">Nuestros Servicios</h2>
      <p class="section-subtitle">Mantén tu vehículo siempre impecable.</p>
      <div class="servicios">
        <div class="card">
          <img src="imagenes/Servicio - Lavado simple.jpg" alt="Lavado simple">
          <h3>Lavado Simple</h3>
          <p>Limpieza completa del interior del vehículo.</p>
          <p class="precio">$20.000</p>
        </div>
        <div class="card">
          <img src="imagenes/Servicio - Lavado Plus.jpg" alt="Lavado Plus">
          <h3>Lavado Plus</h3>
          <p>Limpieza exterior completa con productos premium.</p>
          <p class="precio">$25.000</p>
        </div>
        <div class="card">
          <img src="imagenes/Servicios - Lavado Completo.png" alt="Lavado Completo">
          <h3>Lavado Completo</h3>
          <p>Lavado completo interior y exterior premium.</p>
          <p class="precio">$40.000</p>
        </div>
      </div>
    </div>
  </section>

  <!-- RESEÑAS -->
  <section class="reseñas" id="reseñas">
    <div class="container">
      <h2 class="section-title">Reseñas</h2>
      <p class="section-subtitle">Lo que opinan nuestros clientes.</p>

      <?php
        $conn = new mysqli("localhost","root","","autolavado");
        if ($conn->connect_error) { die("Error: ".$conn->connect_error); }
        $sql = "SELECT nombre,email,mensaje,puntuacion FROM reseñas";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
            echo '<div class="reseña">';
            echo '<h3>'.htmlspecialchars($row["nombre"]).'</h3>';
            echo '<p>"'.htmlspecialchars($row["mensaje"]).'"</p>';
            echo '<p><small>'.htmlspecialchars($row["email"]).'</small></p>';
            echo '<p class="stars">'.str_repeat("★",$row["puntuacion"]).str_repeat("☆",5-$row["puntuacion"]).'</p>';
            echo '</div>';
          }
        } else {
          echo "<p>No hay reseñas aún.</p>";
        }
        $conn->close();
      ?>

    </div>
  </section>

  <!-- FORMULARIO -->
  <section>
    <div class="container">
      <h2 class="section-title">Deja tu Reseña</h2>
      <p class="section-subtitle">Tu opinión es muy valiosa para nosotros.</p>
      <form action="reseñas.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" required>
        <label for="mensaje">Comentario:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
        <label for="puntuacion">Puntuación:</label>
        <select id="puntuacion" name="puntuacion" required>
          <option value="" disabled selected>Selecciona</option>
          <option value="1">1 - Muy Malo</option>
          <option value="2">2 - Malo</option>
          <option value="3">3 - Regular</option>
          <option value="4">4 - Bueno</option>
          <option value="5">5 - Excelente</option>
        </select>
        <button type="submit">Enviar Reseña</button>
      </form>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>&copy; 2025 AutoLavadoPro. Todos los derechos reservados. <span>Facundo Noriega</span> y <span>Julián Marengo</span></p>
  </footer>

</body>
</html>
