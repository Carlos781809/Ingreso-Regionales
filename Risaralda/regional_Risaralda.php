<?php include('../sesion.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risaralda</title>
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

    <h1>Risaralda</h1>

    <script>
  function cerrarSesion() {
    window.location.href = '../cerrar.php';
  }
</script>

</body>
</html>