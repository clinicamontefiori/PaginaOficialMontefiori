<?php
// Iniciar o reanudar la sesión
session_start();
// Destruir todas las variables de sesión
session_unset();
// Destruir la sesión
session_destroy();
// Redirigir a la página de inicio de sesión u otra página deseada
header("Location: ../cms");
exit; // Asegúrate de que no haya código adicional después de la redirección
?>