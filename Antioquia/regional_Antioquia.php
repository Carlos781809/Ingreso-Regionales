<?php include('../sesion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Regional Antioquia</title>
  <style>
    body {
        background-image: url('../fotillos/Direccion\ General.jpg');
       

      font-family: Arial, sans-serif;
      background: #e6f2f8;
      color: #333;
      margin: 0;
      padding: 20px;
      text-align: center;
    }

    h1 {
      color: #2c6e49;
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
      border: 2px solid #4caf50;
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
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 10px;
    }

    .idf-list button {
      display: block;
      width: 100%;
      background: #e0f7e9;
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
      background-color: #c8f5d4;
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


  <h1>Regional Antioquia</h1>

  <div class="sede-container" id="sedeContainer"></div>

  <script>
 function cerrarSesion() {
    window.location.href = '../cerrar.php';
  }

    const sedes = [
      "Despacho Dirección",
      "Centro de los Recursos Naturales Renovables - La Salada",
      "Centro de Formación en Diseño, Confección y Moda",
      "Centro para el Desarrollo del Hábitat y la Construcción",
      "Centro de Tecnología de la Manufactura Avanzada",
      "Centro Tecnológico del Mobiliario",
      "Centro Textil y de Gestión Industrial",
      "Centro de Comercio",
      "Centro de Servicios de Salud",
      "Centro de Servicios y Gestión Empresarial",
      "Complejo Tecnológico para la Gestión Agroempresarial",
      "Complejo Tecnológico Minero Agroempresarial",
      "Centro de la Innovación, la Agroindustria y la Aviación",
      "Complejo Tecnológico, Turístico y Agroindustrial del Occidente Antioqueño",
      "Centro de Formación Minero Ambiental"
    ];

    const sedeContainer = document.getElementById('sedeContainer');

    function toggleList(id) {
      const list = document.getElementById(id);
      list.style.display = list.style.display === 'block' ? 'none' : 'block';
    }

    function goToIDF(idfId, sedeName) {
      const safeSede = sedeName.replace(/\s+/g, '_').replace(/[^\w]/g, '');
      window.location.href = `Informacion_${safeSede}/informacion_${idfId.toLowerCase()}.html`;
    }

    function createSedeBlock(name, index) {
      const listId = `list${index}`;
      const block = document.createElement('div');
      block.className = 'sede-block';

      const button = document.createElement('button');
      button.className = 'sede-btn';
      button.textContent = name;
      button.onclick = () => toggleList(listId);

      const list = document.createElement('div');
      list.id = listId;
      list.className = 'idf-list';

      // Generar 9 IDF
      for (let i = 1; i <= 9; i++) {
        const idfBtn = document.createElement('button');
        idfBtn.textContent = `IDF${i}`;
        idfBtn.onclick = () => goToIDF(`IDF${i}`, name);
        list.appendChild(idfBtn);
      }

      // Agregar 1 MDF
      const mdfBtn = document.createElement('button');
      mdfBtn.textContent = `MDF`;
      mdfBtn.onclick = () => goToIDF('MDF', name);
      list.appendChild(mdfBtn);

      block.appendChild(button);
      block.appendChild(list);
      return block;
    }

    sedes.forEach((sede, i) => {
      const block = createSedeBlock(sede, i + 1);
      sedeContainer.appendChild(block);
    });
  </script>
</body>
</html>
