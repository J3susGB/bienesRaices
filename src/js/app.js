document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color.sheme: dark)'); //Leerá si el usuario prefiere modo claro u oscuro en su dispositivo. matches=true será modo oscuro y false modo claro
    //console.log(prefiereDarkMode.matches);

    if (prefiereDarkMode.matches) { //Si el usuario tiene modo oscuro activo en su SO
        document.body.classList.add('dark-mode');
    } else { //Si el usuario tiene modo claro activo en su SO:
        document.body.classList.remove('dark-mode');
    }

    //Si usuario cambio el modo con la página abierta, sin necesidad de recargar, cambiará de modo automáticamente
    prefiereDarkMode.addEventListener('change', function() { 
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu'); //Con esto selecciona la clase

    mobileMenu.addEventListener('click', navegacionResponsive); //Registra evento de click en funcion navegacionResponsive
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    // if (navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // } else {
    //     navegacion.classList.add('mostrar');
    // }

    navegacion.classList.toggle('mostrar') //Este código hace lo mismo que el comentado arriba, pero más pro

}