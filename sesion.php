<?php
session_start();

// Verifica inactividad (3 minutos = 180 segundos)
if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad'] > 180)) {
    session_unset();
    session_destroy();
    echo "<script>alert('Sesión cerrada por inactividad'); window.location.href = '../index.html';</script>";
    exit();
}

// Refresca la actividad
$_SESSION['ultima_actividad'] = time();

// Si no hay sesión activa, redirige al login
if (!isset($_SESSION['activo']) || $_SESSION['activo'] !== 1) {
    echo "<script>alert('Acceso denegado. Inicia sesión.'); window.location.href = '../index.html';</script>";
    exit();
}

// Obtiene nombre y hora de login
$nombreUsuario = $_SESSION['usuario'];
$horaIngreso = $_SESSION['ultima_actividad'];
$horaFormateada = date('Y-m-d H:i:s', $horaIngreso);
?>