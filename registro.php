<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = trim($_POST['nombre']);
    $cedula     = trim($_POST['cedula']);
    $correo     = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);
    $confirmar  = trim($_POST['confirmar_contrasena']);
    $regional_id = intval($_POST['regional']); // Aquí se corrige el name del select

    $rol_id = 1; // Por defecto aprendiz

    // Validación de campos obligatorios
    if ($nombre && $cedula && $correo && $contrasena && $confirmar && $regional_id) {

        if ($contrasena !== $confirmar) {
            echo "<script>alert('Las contraseñas no coinciden'); window.history.back();</script>";
            exit;
        }

        // Verificar si ya existe usuario con ese correo o cédula
        $stmtCheck = $conn->prepare("SELECT * FROM usuarios WHERE correo = ? OR cedula = ?");
        $stmtCheck->execute([$correo, $cedula]);

        if ($stmtCheck->fetch(PDO::FETCH_ASSOC)) {
            echo "<script>alert('El usuario ya está registrado'); window.location.href = 'index.html';</script>";
            exit;
        }

        // Encriptar la contraseña
        $hashed = password_hash($contrasena, PASSWORD_DEFAULT);

        // Insertar en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, cedula, correo, contrasena, rol_id, regional_id) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nombre, $cedula, $correo, $hashed, $rol_id, $regional_id])) {
            echo "<script>alert('Registro exitoso'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Error al registrar usuario'); window.location.href = 'inicia_sesion.html';</script>";
        }

    } else {
        echo "<script>alert('Todos los campos son obligatorios'); window.location.href = 'inicia_sesion.html';</script>";
    }
}
?>
