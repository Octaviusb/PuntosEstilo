<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $documento = $_POST["documento"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $ciudad = $_POST["ciudad"];
    $terminos = isset($_POST["terminos"]) ? "Aceptado" : "No Aceptado";
    

    // Verificar si se enviaron datos por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $documento = $_POST['documento'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $ciudad = $_POST['ciudad'];
    
        // Aquí puedes realizar la validación y el procesamiento de los datos, por ejemplo, insertarlos en una base de datos
        // También puedes redirigir al usuario a una página de confirmación o mostrar un mensaje de éxito
    
        // Ejemplo de redirección a una página de confirmación
        header("Location: registro_exitoso.html");
        exit();
    } else {
        // Si se intenta acceder al archivo sin enviar datos por POST, redirigir al formulario de registro
        header('Location: formulario_registro.php');
        exit();
    }
    
    

    // Ejemplo de redirección a una página de confirmación
    header("Location: registro_exitoso.html");
    exit();
}
?>
