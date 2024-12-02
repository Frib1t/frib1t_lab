document.addEventListener('DOMContentLoaded', () => {
    console.log("IT Corp Login Page Loaded");

    // Si hay un mensaje de error, mostrarlo en el formulario
    const errorMessage = '<?php echo $error_message; ?>';
    if (errorMessage) {
        const errorElement = document.createElement('div');
        errorElement.classList.add('error-message');
        errorElement.textContent = errorMessage;
        document.querySelector('.login-box').appendChild(errorElement);
    }
});
