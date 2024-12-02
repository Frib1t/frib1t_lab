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
    <title>Credenciales - TechCorp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="panel-container">
        <header>
            <h1>Credenciales</h1>
            <nav>
                <ul>
                    <li><a href="panel.php">Panel de Administración</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <section class="content">
            <h2>Credenciales de acceso:</h2>
            <pre><?php echo file_get_contents('/var/www/html/creds.txt'); ?></pre>
        </section>
    </div>
    <script src="script.js"></script>
</body>
</html>
