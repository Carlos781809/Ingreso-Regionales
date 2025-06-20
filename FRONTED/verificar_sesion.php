<?php
session_start();

// Verificar si está activa
if (!isset($_SESSION['activo']) || $_SESSION['activo'] !== 1) {
    header("Location: index.html");
    exit();
}

// Verificar tiempo de inactividad (3 min = 180 seg)
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso'] > 180)) {
    session_unset();
    session_destroy();
    echo "<script>alert('Sesión cerrada por inactividad'); window.location.href = 'index.html';</script>";
    exit();
}

// Si todo va bien, actualizar el tiempo
$_SESSION['ultimo_acceso'] = time();
?>