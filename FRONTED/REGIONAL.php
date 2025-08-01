<?php
session_start();

// Bloquea el caché para evitar volver con el botón de avanzar
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['activo']) || $_SESSION['activo'] !== 1) {
    echo "<script>alert('Acceso denegado. Debes iniciar sesión.'); window.location.href = 'index.html';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="UTF-8">
  <title>REGIONALES</title>
  <style>
    body {
       
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ccc;
      background-attachment: fixed;
      padding: 10px;
      font-family: Arial, sans-serif;
    }

    /* Barra de búsqueda */
    .barra-busqueda {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 30px;
    }

    .barra-busqueda input {
      padding: 10px;
      font-size: 16px;
      width: 300px;
      border-radius: 8px 0 0 8px;
      border: 1px solid #062D4F;
      outline: none;
    }

    .barra-busqueda span {
     
      padding: 10px 15px;
      border: 1px solid #f0f8ff;
      border-left: none;
    }

    .barra-busqueda button {
      padding: 10px 15px;
      font-size: 16px;
      border: none;
      background-color: #062D4F;
      color: white;
      cursor: pointer;
      border-radius: 0 8px 8px 0;
    }

    /* Contenedor de cuadros */
    .contenedor-cuadros {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
    }

    .cuadro {
  display: inline-block;
  background-color: white;
  border: 2px solid #062D4F;
  border-radius: 10px;
  box-shadow: 2px 2px 8px rgba(208, 58, 58, 0.1);
  padding: 15px 20px;
  font-size: 16px;
  white-space: nowrap; /* evita que se parta en varias líneas */
}

.cuadro:hover {
  border-color: #062D4F; /* verde suave */
  transition: border-color 0.3s ease;
  cursor: pointer;
}

  </style>



</head>
<body>

<form action="cerrar_sesion.php" method="post" style="position: absolute; top: 10px; right: 10px;">
  <button type="submit" style="padding: 10px 15px; background-color: #062D4F; color: white; border: none; border-radius: 5px; cursor: pointer;">
    Cerrar sesión
  </button>
</form>


  <div class="barra-busqueda">
    
    <input type="text" placeholder="Busca aquí...">
    <button>➤</button>
  </div>

  <div class="contenedor-cuadros">
    <div class="cuadro" data-pagina="Direccion General.html">Direccion General</div>
    <div class="cuadro" data-pagina="Antioquia.html">Antioquia</div>
    <div class="cuadro" data-pagina="Atlantico.html">Atlantico</div>
    <div class="cuadro" data-pagina="Distrito Capital.html">Distrito Capital</div>
    <div class="cuadro" data-pagina="Bolivar.html">Bolivar</div>
    <div class="cuadro" data-pagina="Boyaca.html">Boyaca</div>
    <div class="cuadro" data-pagina="Caldas.html">Caldas</div>
    <div class="cuadro" data-pagina="Caqueta.html">Caqueta</div>
    <div class="cuadro" data-pagina="Cauca.html">Cauca</div>
    <div class="cuadro" data-pagina="Cesar.html">Cesar</div>
    <div class="cuadro" data-pagina="Cordoba.html">Cordoba</div>
    <div class="cuadro" data-pagina="Cundinamarca.html">Cundinamarca</div>
    <div class="cuadro" data-pagina="Choco.html">Choco</div>
    <div class="cuadro" data-pagina="Huila.html">Huila</div>
    <div class="cuadro" data-pagina="Guajira.html">Guajira</div>
    <div class="cuadro" data-pagina="Magdalena.html">Magdalena</div>
    <div class="cuadro" data-pagina="meta.html">Meta</div>
    <div class="cuadro" data-pagina="Nariño.html">Nariño</div>
    <div class="cuadro" data-pagina="Norte de Santander.html">Norte de Santander</div>
    <div class="cuadro" data-pagina="Quindio.html">Quindio</div>
    <div class="cuadro" data-pagina="Risaralda.html">Risaralda</div>
    <div class="cuadro" data-pagina="Santander.html">Santander</div>
    <div class="cuadro" data-pagina="Sucre.html">Sucre</div>
    <div class="cuadro" data-pagina="Tolima.html">Tolima</div>
    <div class="cuadro" data-pagina="Valle.html">Valle</div>
    <div class="cuadro" data-pagina="Arauca.html">Arauca</div>
    <div class="cuadro" data-pagina="Casanare.html">Casanare</div>
    <div class="cuadro" data-pagina="Putumayo.html">Putumayo</div>
    <div class="cuadro" data-pagina="San Andres.html">San Andres</div>
    <div class="cuadro" data-pagina="Amazonas.html">Amazonas</div>
    <div class="cuadro" data-pagina="Guainía.html">Guainía</div>
    <div class="cuadro" data-pagina="Guaviare.html">Guaviare</div>
    <div class="cuadro" data-pagina="Vaupes.html">Vaupes</div>
    <div class="cuadro" data-pagina="Vichada.html">Vichada</div>
    
  </div>

</body>
<script>
const inputBusqueda = document.querySelector('.barra-busqueda input');
const botonBusqueda = document.querySelector('.barra-busqueda button');
const cuadros = document.querySelectorAll('.cuadro');

function filtrarCuadros() {
  const texto = inputBusqueda.value.toLowerCase().trim();

  cuadros.forEach(cuadro => {
    const contenido = cuadro.textContent.toLowerCase();
    if (contenido.includes(texto)) {
      cuadro.style.display = 'inline-block';
    } else {
      cuadro.style.display = 'none';
    }
  });
}

inputBusqueda.addEventListener('input', filtrarCuadros);
botonBusqueda.addEventListener('click', filtrarCuadros);

cuadros.forEach(cuadro => {
  cuadro.ondblclick = () => {
    const nombre = cuadro.textContent.trim();
    const ruta = `${nombre}/${nombre}.html`;
    window.location.href = ruta;
  };
});


  
</script>

</html>
