<?php
try {
    // Conexión a la base de datos
    $db = new PDO("sqlite:usuarios.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recibe datos del formulario
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Prepara la consulta
    $sql = "INSERT INTO usuarios (nombre, cedula, correo, contraseña) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nombre, $cedula, $correo, $contrasena]);

    echo "Usuario registrado con éxito.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
