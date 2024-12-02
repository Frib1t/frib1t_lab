<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: /index.php");
    exit;
}

function getServerStatus() {
    $cpuUsage = sys_getloadavg()[0];
    $memoryUsage = shell_exec("free -m | awk 'NR==2{print $3\"/\"$2\" MB\"}'");
    return ['cpu' => $cpuUsage, 'memory' => $memoryUsage];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del servidor - TechCorp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="panel-container">
        <header>
            <h1>Estado del Servidor</h1>
            <nav>
                <ul>
                    <li><a href="panel.php">Panel de Administración</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <section class="content">
            <h2>Estado actual del sistema:</h2>
            <p><strong>Uso de CPU:</strong> <?php echo getServerStatus()['cpu']; ?>%</p>
            <p><strong>Uso de Memoria:</strong> <?php echo getServerStatus()['memory']; ?> </p>
        </section>
    </div>
    <script src="script.js"></script>
</body>
</html>
