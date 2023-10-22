$(document).ready(function () {
    let ids = [];
    $('.show_materias').each(function () {
        ids.push($(this).attr('id'));
    })

    for (let i = 0; i < ids.length; i++) {
        let id_materia = $(`#${ids[i]}`)

        // Obten el contenido de la celda
        let contenido = id_materia.text()

        // Divide el contenido en dos líneas
        let lineas = contenido.split(', ')

        if (lineas.length > 1) {
            // Crea un nuevo contenido con un salto de línea
            let nuevoContenido = lineas.join('.<br>') + '.'

            // Establece el nuevo contenido en la celda
            id_materia.html(nuevoContenido)
        }
    }
})
