<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $fullName = strip_tags(trim($_POST["fullName"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phoneNumber"]);
    $message = trim($_POST["message"]);

    // Verifica que todos los campos estén completos
    if (empty($fullName) || empty($email) || empty($phone) || empty($message)) {
        http_response_code(400);
        echo "Por favor, completa todos los campos del formulario.";
        exit;
    }

    // Configura el destinatario del correo
    $to = "lucasleiroa@gmail.com";
     // Aquí va tu dirección de correo electrónico

    // Configura el asunto del correo
    $subject = "Nuevo mensaje de contacto desde Hotel Miami";

    // Construye el cuerpo del mensaje
    $email_content = "Nombre: $fullName\n";
    $email_content .= "Correo Electrónico: $email\n";
    $email_content .= "Teléfono: $phone\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Configura las cabeceras del correo
    $headers = "From: $fullName <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envía el correo
    if (mail($to, $subject, $email_content, $headers)) {
        http_response_code(200);
        echo "¡Gracias! Tu mensaje ha sido enviado.";
    } else {
        http_response_code(500);
        echo "Oops! Algo salió mal y no pudimos enviar tu mensaje.";
    }
} else {
    http_response_code(403);
    echo "Hubo un problema con tu envío, por favor intenta nuevamente.";
}
?>
