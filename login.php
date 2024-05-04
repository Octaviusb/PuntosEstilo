<?php
// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php'); // Redirigir al dashboard si el usuario ya está autenticado
    exit();
}

// Verificar si se enviaron datos por POST para el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Verificar que se enviaron el email y la contraseña
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Aquí debes realizar la autenticación, por ejemplo, consultar en la base de datos

        // Si la autenticación es exitosa, establece la sesión y redirige al dashboard
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $_POST['email'];
        header('Location: dashboard.php');
        exit();
    } else {
        // Si no se enviaron todos los datos necesarios
        $_SESSION['login_error'] = "Por favor, complete todos los campos.";
        header('Location: login.php'); // Redirigir de nuevo al formulario de login
        exit();
    }
}

// Verificar si se enviaron datos por POST para el registro de nuevo usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    // Verificar que se enviaron todos los datos necesarios
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Aquí debes procesar el registro del nuevo usuario, por ejemplo, insertar en la base de datos

        // Redirigir al login después del registro exitoso
        header('Location: login.php');
        exit();
    } else {
        // Si no se enviaron todos los datos necesarios
        $_SESSION['registro_error'] = "Por favor, complete todos los campos.";
        header('Location: registro.php'); // Redirigir de nuevo al formulario de registro
        exit();
    }
}

// Verificar si se enviaron datos por POST para la recuperación de contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recuperar'])) {
    // Verificar que se enviaron el email para recuperación
    if (isset($_POST['email'])) {
        // Aquí debes procesar la recuperación de contraseña, por ejemplo, enviar un correo con un enlace de recuperación

        // Redirigir a una página de confirmación de recuperación de contraseña
        header('Location: recuperacion_confirmacion.php');
        exit();
    } else {
        // Si no se envió el email necesario
        $_SESSION['recuperacion_error'] = "Por favor, ingrese su correo electrónico.";
        header('Location: recuperacion.php'); // Redirigir de nuevo al formulario de recuperación
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    // Mostrar mensaje de error si existe al intentar iniciar sesión
    if (isset($_SESSION['login_error'])) {
        echo '<p>' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    }

    // Mostrar mensaje de error si existe al intentar registrarse
    if (isset($_SESSION['registro_error'])) {
        echo '<p>' . $_SESSION['registro_error'] . '</p>';
        unset($_SESSION['registro_error']);
    }

    // Mostrar mensaje de error si existe al intentar recuperar contraseña
    if (isset($_SESSION['recuperacion_error'])) {
        echo '<p>' . $_SESSION['recuperacion_error'] . '</p>';
        unset($_SESSION['recuperacion_error']);
    }
    ?>

    <!-- Formulario de Inicio de Sesión -->
    <h3>Iniciar Sesión</h3>
    <form action="login.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Iniciar Sesión" name="login">
    </form>

    <!-- Enlace para recuperar contraseña -->
    
