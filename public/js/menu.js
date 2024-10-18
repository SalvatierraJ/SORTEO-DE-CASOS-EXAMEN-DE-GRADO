let anadir_usuario = document.getElementsByClassName('div-agregar');
anadir_usuario[0].addEventListener('click', function() {
    let nuevo_estudiante = document.getElementsByClassName('nuevo-estudiante');
    nuevo_estudiante[0].style.display = 'flex';
})


let boton_cancelar = document.getElementsByClassName('cancelar');
boton_cancelar[0].addEventListener('click', function() {
    let nuevo_estudiante = document.getElementsByClassName('nuevo-estudiante');
    nuevo_estudiante[0].style.display = 'none';
})