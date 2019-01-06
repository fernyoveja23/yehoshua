/**
 * Funcion para comprobar los formularios donde
 * se piden datos que necesitn ser comprobados
 */
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Para obtener los formularios que tienen la clase de validacion de Bootstrap
        var forms = document.getElementsByClassName('needs-validation');
        // Hace una iteracion sobre los forms y previene el envio de datos vacios
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();