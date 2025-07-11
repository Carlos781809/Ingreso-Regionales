<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    if ($correo && $contrasena) {
        // Buscar por correo únicamente
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['activo'] = true;
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol_id'] = $usuario['rol_id'];
            $_SESSION['regional_id'] = $usuario['regional_id'];
            $_SESSION['ultimo_acceso'] = time(); // Control de inactividad

            // Formatear nombre de archivo de la regional
            $regional = str_replace(' ', '_', $usuario['regional_id']); // Asegura guiones bajos
            $ruta = "regional_{$regional}.html";

            // Verifica si el archivo existe
            if (file_exists($ruta)) {
                header("Location: $ruta");
                exit;
            } else {
                echo "<script>alert('Archivo de regional no encontrado: $ruta'); window.history.back();</script>";
                exit;
            }

        } else {
            echo "<script>alert('Correo o contraseña incorrectos'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Correo y contraseña son obligatorios'); window.history.back();</script>";
        exit;
    }
}
?>
