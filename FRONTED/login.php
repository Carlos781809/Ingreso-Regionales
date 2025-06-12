<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "usuarios_sena");

// Verificar si hubo error de conexión
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$cedula = $_POST['cedula'] ?? '';
$correo = $_POST['correo'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($cedula) || empty($correo) || empty($contraseña)) {
    echo "Por favor completa todos los campos.";
    exit();
}

// Buscar al usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre = ? AND cedula = ? AND correo = ? AND contraseña = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $nombre, $cedula, $correo, $contraseña);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si existe
if ($resultado->num_rows > 0) {
    // Usuario válido
    echo "Acceso permitido. Bienvenido, $nombre 🥺💚";
    // Aquí puedes redirigir con: header("Location: REGIONAL.html");
} else {
    // Usuario no registrado
    echo "Acceso denegado. Usuario no registrado o datos incorrectos ❌";
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
