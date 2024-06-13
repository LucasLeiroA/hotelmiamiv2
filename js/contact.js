(function() {
    emailjs.init('BrlJNsPl27qygISG_'); // Reemplaza con tu identificador de usuario de EmailJS

    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío por defecto

        // Recolectar los datos del formulario
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const phoneNumber = document.getElementById('phoneNumber').value;
        const message = document.getElementById('message').value;

        // Configurar el servicio de EmailJS
        const templateParams = {
            from_name: fullName,
            from_email: email,
            phone_number: phoneNumber,
            message: message
        };

        // Enviar el correo electrónico
        emailjs.send('service_dmpokdb', 'template_wthoygc', templateParams)
            .then(function(response) {
                console.log('Correo electrónico enviado correctamente', response);
                alert('El mensaje se envió correctamente');
            }, function(error) {
                console.error('Error al enviar el correo electrónico', error);
                alert('Ocurrió un error al enviar el mensaje');
            });
    });
})();