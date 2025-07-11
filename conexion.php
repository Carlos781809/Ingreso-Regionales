<?php
try {
    $conn = new PDO("sqlite:C:/xampp/htdocs/Ingreso-Regionales/FRONTED/usuarios.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
