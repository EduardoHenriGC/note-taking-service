window.hideAlertAfterTimeout = function() {
    const alertElement = document.getElementById('success-alert');
    if (alertElement) {
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 5000); // Esconde o alerta após 5 segundos
    }
};