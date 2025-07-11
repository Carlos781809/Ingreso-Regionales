<?php include('../sesion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Amazonas</title>
  <style>
   body {

      margin: 0;
      padding: 30px;
      background-color: #ccc;
      font-family: Arial, sans-serif;
      text-align: center;
    }

    h1 {
      color: #062d4f;
      margin-bottom: 30px;
    }

    .sede-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
    }

    .sede-block {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 300px;
    }

    .sede-btn {
      width: 100%;
      padding: 14px 28px;
      font-size: 16px;
      color: #000;
      background-color: #fff;
      border: 2px solid #062d4f;
      border-radius: 12px;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .sede-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .idf-list {
      display: none;
      text-align: left;
      margin-top: 10px;
      width: 100%;
      background: #fff;
      border: 1px solid #062d4f;
      border-radius: 8px;
      padding: 10px;
    }

    .idf-list button {
      display: block;
      width: 100%;
      background: #ccc; /*color principal de los botones de idf y mdf*/
      border: none;
      padding: 10px;
      text-align: left;
      cursor: pointer;
      font-size: 15px;
      border-radius: 6px;
      margin-bottom: 6px;
      transition: transform 0.2s, background-color 0.2s;
    }

    .idf-list button:hover {
      transform: scale(1.05);
      background-color: #1a4b75; /*color que ilumina los IDFs y MDF*/
    }
  </style>
</head>
<body>
  <form action="cerrar.php" method="POST" style="position: absolute; top: 10px; right: 10px;">
  <button type="submit" style="background-color: #ccc; border: 2px solid #062D4F; color: #062D4F; padding: 8px 16px; border-radius: 10px; font-size: 14px; cursor: pointer;">
    Cerrar sesión
  </button>
</form>


<div style="background:#ccc; padding:10px; border-bottom:2px solid #062D4F;">
  <strong>Bienvenido:</strong> <?php echo htmlspecialchars($nombreUsuario); ?> |
  <strong>Último ingreso:</strong> <?php echo $horaFormateada; ?>
  <button onclick="cerrarSesion()" style="float:right; background:#062D4F; color:white; border:none; padding:5px 10px; border-radius:5px;">Cerrar sesión</button>
</div>


  <h1>Regional Amazonas</h1>

  <div class="sede-container">
    <div class="sede-block">
      <button class="sede-btn" onclick="toggleList('list1')">Despacho Dirección</button>
      <div id="list1" class="idf-list"></div>
    </div>

    <div class="sede-block">
      <button class="sede-btn" onclick="toggleList('list2')">Centro para la Biodiversidad y el Turismo del Amazonas</button>
      <div id="list2" class="idf-list"></div>
    </div>
  </div>

  <script>
 function cerrarSesion() {
    window.location.href = '../cerrar.php';
  }

    function toggleList(id) {
      const list = document.getElementById(id);
      list.style.display = list.style.display === 'block' ? 'none' : 'block';
    }

    function goToIDF(idfId, sedeId) {
      const folder = sedeId === 'list1' ? 'Despacho_Direccion' : 'Centro_Biodiversidad';
      window.location.href = `Informacion_${folder}/informacion_${idfId.toLowerCase()}.html`;
    }

    function generateIDFButtons(containerId, count) {
      const container = document.getElementById(containerId);
      for (let i = 1; i <= count; i++) {
        const btn = document.createElement('button');
        const idfName = `IDF${i}`;
        btn.textContent = idfName;
        btn.onclick = () => goToIDF(idfName, containerId);
        container.appendChild(btn);
      }
    }

    generateIDFButtons('list1', 10);
    generateIDFButtons('list2', 10);
  </script>

</body>
</html>
