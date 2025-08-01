<?php include('../sesion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dirección General</title>
  <style>
    body {
      margin: 0;
      padding: 30px;
      background-color: #ccc;
      font-family: Arial, sans-serif;
      text-align: center;
    }

    h1 {
      margin-bottom: 40px;
      color: #062D4F;
    }

    .contenedor-cuadros {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .cuadro {
      background-color: white;
      border: 2px solid #062D4F;
      border-radius: 10px;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
      padding: 25px 40px;
      font-size: 18px;
      cursor: pointer;
      transition: border 0.3s, transform 0.2s;
    }

    .cuadro:hover {
      border: 2px solid #062D9F;
      transform: scale(1.03);
    }

    .idf-list {
      margin-top: 10px;
    }

    .idf-list button {
      display: block;
      margin: 6px auto;
      padding: 10px 20px;
      background-color: #d9dbf0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .idf-list button:hover {
      background-color:rgb(81, 117, 177);
    }

    .barra-superior {
      background: #ccc;
      padding: 10px;
      border-bottom: 2px solidrgb(12, 242, 116);
      text-align: left;
      font-size: 16px;
    }

    .barra-superior button {
      float: right;
      background: #062D4F;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .barra-superior button:hover {
      background-color: #0b3d6d;
    }
  </style>
</head>
<body>

  <!--BLOQUE DE BIENVENIDA Y CIERRE DE SESIÓN -->
  <div class="barra-superior">
    <strong>Bienvenido:</strong> <?php echo htmlspecialchars($_SESSION['usuario']); ?> |
    <strong>Último ingreso:</strong> <?php echo $_SESSION['ultima_hora']; ?>
    <button onclick="cerrarSesion()">Cerrar sesión</button>
  </div>

  <h1>Dirección General</h1>

  <div class="contenedor-cuadros">
    <div class="cuadro">
      Torre Sur
      <div class="idf-list">
        <button onclick="goToIDF('IDF4', 'torresur')">IDF4</button>
        <button onclick="goToIDF('IDF5', 'torresur')">IDF5</button>
        <button onclick="goToIDF('IDF10', 'torresur')">IDF10</button>
      </div>
    </div>

    <div class="cuadro">
      Torre Central
      <div class="idf-list">
        <button onclick="goToIDF('MDF', 'torrecentral')">MDF</button>
        <button onclick="goToIDF('IDF2', 'torrecentral')">IDF2</button>
        <button onclick="goToIDF('IDF3', 'torrecentral')">IDF3</button>
        <button onclick="goToIDF('IDF1', 'torrecentral')">IDF1</button>
      </div>
    </div>

    <div class="cuadro">
      Torre Norte
      <div class="idf-list">
        <button onclick="goToIDF('IDF6', 'torrenorte')">IDF6</button>
        <button onclick="goToIDF('IDF7', 'torrenorte')">IDF7</button>
        <button onclick="goToIDF('IDF8', 'torrenorte')">IDF8</button>
        <button onclick="goToIDF('IDF9', 'torrenorte')">IDF9</button>
      </div>
    </div>
  </div>

  <script>
    function cerrarSesion() {
      window.location.href = '../cerrar.php';
    }

    function goToIDF(idfId, sedeId) {
  window.location.href = `${sedeId}/${idfId}.php`;
}

  </script>

</body>
</html>
