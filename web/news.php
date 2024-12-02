<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: /index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - TechCorp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="panel-container">
        <header>
            <h1>Noticias</h1>
            <nav>
                <ul>
                    <li><a href="panel.php">Panel de Administración</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <section class="content">
            <h2>Últimas noticias:</h2>
            <p>El sistema está funcionando correctamente.</p>
            <p>Actualización de seguridad programada para la próxima semana.</p>
        </section>
    </div>
    <script src="script.js"></script>
</body>
</html>
