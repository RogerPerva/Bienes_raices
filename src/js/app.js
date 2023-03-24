document.addEventListener('DOMContentLoaded', function(){

    eventListeners();
    darkMode();
});

function darkMode(){
    const botonDarkMode=document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode'); //agregamos la clase dentro del body
    })
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu'); //seleccionamos elementos del html

    mobileMenu.addEventListener('click', navegacionResposive);
}

//  Con el siguiente codigo agregamos la clase de mostrar que hace que se muestre y oculte la barra de navegacion, una manera mas corta seria tambien
//  function navegacionResposive(){
//     const navegacion = document.querySelector('.navegacion');
//     if(navegacion.classList.contains('mostrar')){
//         navegacion.classList.remove('mostrar');
//     }else {
//         navegacion.classList.add('mostrar');
//     } }

 function navegacionResposive(){
    const navegacion = document.querySelector('.navegacion');
        navegacion.classList.toggle('mostrar');
    }  



