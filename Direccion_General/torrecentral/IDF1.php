<?php include('../../sesion.php'); ?>

<?php
$horaFormateada = date("H:i", strtotime($horaFormateada . " -7 hours"));?>



<!DOCTYPE html>
<html lang="en">
<head>
  <button onclick="cerrarSesion()" style="position: fixed; top: 10px; right: 10px; padding: 8px 12px; background-color: #062D4F; color: white; border: none; border-radius: 5px; cursor: pointer;">Cerrar sesión</button>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>

body {
  background-color: #ccc;
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


    <h1>IDF 1 en almacen</h1>

      <div>
    <button onclick="toggleInfo('sw1')">SwitchCore 1</button>
    <div id="sw1" style="display:none; margin-top: 10px;">
      <p><strong>Nomenclatura:</strong> 123456789</p>
      <p><strong>Placa SENA:</strong>123456789</p>
      <p><strong>Número Serial:</strong>123456789</p>
      <p><strong>RACK:</strong> 1</p>
      <p><strong>Número de Puertos:</strong>48</p>

      <button onclick="toggleInfo ('APs')">AccessPoint Conectados</button>
      <div id="APs" style="display: none; margin-top: 10px;">

        <button onclick="toggleInfo ('AP1')">AccessPoint 1</button>
        <div id="AP1" style="display: none; margin-top: 10px;">
            <p><strong>Conectado a:</strong>SwitchCore 1</p>
            <p><strong>PUERTO:</strong>34</p>
            <p><strong>PATCH PANEL 5:</strong> PUERTO 10 </p>
             <p><strong>UBICADO EN:</strong>IDF1</p>
        </div>

        <button onclick="toggleInfo ('AP2')">AccessPoint 2</button>
        <div id="AP2" style="display: none; margin-top: 10px;">
            <p><strong>Conectado a:</strong>SwitchCore 1</p>
            <p><strong>PUERTO:</strong>25</p>
            <p><strong>PATCH PANEL 3:</strong> PUERTO 24 </p>
            <p><strong>UBICADO EN:</strong>IDF1</p>
        </div>

        <BUtton onclick="toggleInfo ('SFPs')">SFPs Conectados</BUtton>
        <div id="SFPs" style="display: none; margin-top: 10px;">
            

        </div>
     


    <script>


    function toggleInfo(id) {
      const section = document.getElementById(id);
      section.style.display = section.style.display === 'none' ? 'block' : 'none';
    }


  let tiempoInactividad = 3 * 60 * 1000; // 3 minutos en milisegundos
  let temporizador;

  function reiniciarTemporizador() {
    clearTimeout(temporizador);
    temporizador = setTimeout(() => {
      alert("Sesión cerrada por inactividad");
      window.location.href = '../../cerrar.php';
    }, tiempoInactividad);
  }

  // Detectar actividad del usuario
  document.addEventListener('mousemove', reiniciarTemporizador);
  document.addEventListener('keydown', reiniciarTemporizador);
  document.addEventListener('click', reiniciarTemporizador);
  document.addEventListener('scroll', reiniciarTemporizador);

  // Iniciar por primera vez
  reiniciarTemporizador();

  function cerrarSesion() {
    window.location.href = '../../cerrar.php';
  }



  </script>

</body>
</html>