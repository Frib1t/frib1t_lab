<?php
session_start();

$error_message = ""; // Variable para almacenar el mensaje de error

// Si el formulario es enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar el nombre de usuario
    if ($username === 'admin') {
        // Verificar la contraseña
        if ($password === 'P@ssw0rd') {
            // Credenciales correctas
            $_SESSION['authenticated'] = true; // Marcar usuario como autenticado
            $_SESSION['username'] = $username; // Guardar el nombre de usuario
            header('Location: panel.php'); // Redirigir al panel
            exit();
        } else {
            // Contraseña incorrecta para el usuario correcto
            $error_message = "La contraseña de admin es incorrecta.";
        }
    } else {
        // Nombre de usuario incorrecto
        $error_message = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IT Corp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>IT Corp Login</h1>
            <p>¡Bienvenido de nuevo! Inicia sesión para acceder a tu panel.</p>

            <!-- Mostrar el mensaje de error solo si existe -->
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="index.php" method="post">
                <div class="textbox">
                    <input type="text" name="username" placeholder="Nombre de usuario" required>
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn">Iniciar sesión</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
