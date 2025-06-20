<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreIngresado = $_POST['usuario_nombre'] ?? '';
    $contraseñaIngresada = $_POST['usuario_contraseña'] ?? '';

    if (empty($nombreIngresado) || empty($contraseñaIngresada)) {
        echo "<script>alert('Por favor, completa todos los campos'); window.history.back();</script>";
        exit();
    }

    class MiBD extends SQLite3 {
        function __construct() {
            $this->open('usuarios.db');
        }
    }

    $db = new MiBD();

    if (!$db) {
        die("No se pudo conectar a la base de datos");
    }

    // Buscar TODOS los usuarios
    $stmt = $db->prepare("SELECT * FROM usuarios");
    $result = $stmt->execute();

    $usuarioEncontrado = false;
    $nombreExactoCoincide = false;
    $contraseñaCoincide = false;

    $contraseñaHash = hash('sha256', $contraseñaIngresada); 
    while ($usuario = $result->fetchArray(SQLITE3_ASSOC)) {
        if (strcasecmp($usuario['nombre'], $nombreIngresado) === 0) {
            $usuarioEncontrado = true;

            if ($usuario['nombre'] === $nombreIngresado) {
                $nombreExactoCoincide = true;

                if ($usuario['contrasena'] === $contraseñaHash) { 
                    $contraseñaCoincide = true;
                    break;
                }
            }
        }
    }

   
    if (!$usuarioEncontrado) {
        echo "<script>alert('Usuario no registrado'); window.history.back();</script>";
    } elseif (!$nombreExactoCoincide) {
        echo "<script>alert('Nombre incorrecto'); window.history.back();</script>";
    } elseif (!$contraseñaCoincide) {
        echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
    } else {
        session_start();

        $_SESSION['activo'] = 1;
        $_SESSION['usuario'] = $nombreIngresado;
        $_SESSION['ultima_actividad'] = time();

        echo "<script>alert('Bienvenido, $nombreIngresado'); window.location.href = 'REGIONAL.php';</script>";

        $db->close();
    }

} else {
    echo "Acceso denegado.";
}
?>