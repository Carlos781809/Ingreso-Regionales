
<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Sesión cerrada exitosamente'); window.location.href = 'index.html';</script>";
exit();
?>
