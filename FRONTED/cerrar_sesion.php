<?php
session_start();
session_unset();
session_destroy();

// También bloqueamos el caché al salir
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");

// Volver al login
header("Location: index.html");
exit();
?>