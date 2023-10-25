$(document).ready(function () {
    let id_update = [], arrayMaterias = []

    $('.show_modal_update').each(function () {
        id_update.push($(this).attr('id'))
    })

    for (let i = 0; i < id_update.length; i++) {
        let textMateriaID = id_update[i].replace("update", "")

        $(`#${id_update[i]}`).on("click", function () {
            let celdaMaterias = $(`#materias${textMateriaID}`)
            let contenido = celdaMaterias.text() // Obten el contenido de la celda

            // Divide el contenido en dos líneas, Usa filter() para eliminar elementos vacíos
            arrayMaterias = contenido.split('.').filter(function (elemento) {
                return elemento !== ""
            })

            // Itera a través de cada casilla de verificación con la clase "materia_update"
            $(`.materia_update_${textMateriaID}`).each(function (index) {
                let valorCasilla = $(this).val()
                let estaMarcada = arrayMaterias.includes(valorCasilla)
                $(this).prop('checked', estaMarcada)

                let uniqueId = `materiaUpdate_${index + 1}` // Generar un ID único
                $(this).attr({'id': uniqueId}) // Agrega el atributo 'id' con el valor generado
                $(this).next('label').attr({'for': uniqueId}) // Asocia la etiqueta con el checkbox usando el atributo 'for'
            })

        })

        // Evento para actualizar la lista de materias al momento de dar click en cada check de las materias
        $(`.materia_update_${textMateriaID}`).on("click", function () {
            arrayMaterias = [] // Limpia el array de valores seleccionados

            // Itera sobre las casillas de verificación marcadas
            $(`.materia_update_${textMateriaID}:checked`).each(function () {
                arrayMaterias.push($(this).val()) // Agrega el valor de la casilla marcada al array
            })
        })

        $(`.closeModalUpdate_${textMateriaID}, .xModal${textMateriaID}`).on("click", function () {
            $(`.materia_update_${textMateriaID}`).removeAttr('id');
            $(`.labelMateriaUpdate_${textMateriaID}`).removeAttr('for');
        })

        $(`.updateData_${textMateriaID}`).on("click", function () {
            // Obtén los valores de los campos de entrada
            let id_nombre = $(`#update_id_${textMateriaID}`).val()
            let update_nombre = $(`#update_nombre_${textMateriaID}`).val()
            let update_apellido = $(`#update_apellido_${textMateriaID}`).val()
            let update_telefono = $(`#update_telefono_${textMateriaID}`).val()
            let update_email = $(`#update_email_${textMateriaID}`).val()

            // Selecciona todos los elementos con la clase "materia_update" que estén marcados
            arrayMaterias = $(`.materia_update_${textMateriaID}:checked`).map(function () {
                return this.value
            }).get()

            let arrayUpdateMaterias = arrayMaterias.join(', ') // Une los elementos con comas y espacio

            // Crea un objeto JavaScript con los datos
            let formUpdateDataAlumno = {
                id_update: id_nombre,
                nombre: update_nombre,
                apellido: update_apellido,
                telefono: update_telefono,
                email: update_email,
                materias: arrayUpdateMaterias,
            }

            // Envía los datos al script PHP utilizando AJAX
            $.ajax({
                type: "POST",
                url: "php/update_data.php",
                data: formUpdateDataAlumno,
                success: function (response) {
                    // Maneja la respuesta del servidor, si es necesario
                    swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: (response),
                        showConfirmButton: false,
                        timer: 2000
                    }).then(
                        $(`.closeModalUpdate_${textMateriaID}`).click(),
                    )
                },
                error: function (error) {
                    swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: (error.responseText),
                        showConfirmButton: false,
                        // timer: 1500
                    })
                }
            })
            $(`.closeModalUpdate_${textMateriaID}, .xModal${textMateriaID}`).prop('checked', false)
            setTimeout(function () {
                location.reload();
            }, 2000) // 2000 milisegundos (2 segundos)
        })
    }
})
