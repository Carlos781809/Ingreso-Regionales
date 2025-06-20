<?php
// Conexión a la base de datos SQLite
$db = new PDO("sqlite:usuarios.db");

// Asegura que la tabla exista
$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    cedula TEXT NOT NULL,
    correo TEXT NOT NULL UNIQUE,
    contrasena TEXT NOT NULL
)");

// Obtener los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$cedula = $_POST['cedula'] ?? '';
$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Validar campos
if (!empty($nombre) && !empty($cedula) && !empty($correo) && !empty($contrasena)) {

    // Encriptar la contraseña con SHA-256
    $contrasenaHash = hash('sha256', $contrasena); // 🔒 Requisito 1

    // Insertar el usuario en la base de datos
    $stmt = $db->prepare("INSERT INTO usuarios (nombre, cedula, correo, contrasena) VALUES (?, ?, ?, ?)");

    if ($stmt->execute([$nombre, $cedula, $correo, $contrasenaHash])) {
        echo "<script>alert('Registro ha sido exitoso'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('El correo ya está registrado'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Por favor llena todos los campos'); window.history.back();</script>";
}
?>