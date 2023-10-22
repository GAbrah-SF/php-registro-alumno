$(document).ready(function () {
    // Selecciona todos los elementos de entrada
    $('.form-control').each(function () {
        let id = $(this).attr('id') // Obtiene el ID de cada elemento
        $(this).attr('name', id) // Agrega el atributo "name" con el mismo valor que el ID
    })
})
