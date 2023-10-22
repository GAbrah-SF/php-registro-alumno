$(document).ready(function () {
    let id_update = [], arrayMaterias = []

    $('.show_modal_update').each(function () {
        id_update.push($(this).attr('id'))
    })

    for (let i = 0; i < id_update.length; i++) {
        let boton_actualizar = $(`#${id_update[i]}`)

        boton_actualizar.on("click", function () {
            // console.log(`#materias${id_update[i]}`)

            let id_materia = $(`#materias${id_update[i]}`)

            // Obten el contenido de la celda
            let contenido = id_materia.text()

            // Divide el contenido en dos líneas
            // Usa filter() para eliminar elementos vacíos
            arrayMaterias = contenido.split('.').filter(function (elemento) {
                return elemento !== ""
            })

            // Itera a través de cada casilla de verificación con la clase "miCheckbox"
            // $(".materia_update").each(function () {
            //     let valorCasilla = $(this).val()
            //     let estaMarcada = arrayMaterias.includes(valorCasilla)
            //
            //     $(this).prop('checked', estaMarcada)
            // })
            // console.log(arrayMaterias)
        })

        $(`#update_data_${id_update[i]}`).on("click", function () {
            // Selecciona todos los elementos con la clase "materia_update" que estén marcados
            arrayMaterias = $('.materia_update:checked').map(function () {
                return this.value
            }).get()

            let arrayUpdateMaterias = arrayMaterias.join(', ') // Une los elementos con comas y espacio
            // console.log(arrayUpdateMaterias)

            // // Obtén los valores de los campos de entrada
            let id_nombre = $(`#update_id_${id_update[i]}`).val()
            let update_nombre = $(`#update_nombre_${id_update[i]}`).val()
            let update_apellido = $(`#update_apellido_${id_update[i]}`).val()
            let update_telefono = $(`#update_telefono_${id_update[i]}`).val()
            let update_email = $(`#update_email_${id_update[i]}`).val()

            // Crea un objeto JavaScript con los datos
            let formUpdateDataAlumno = {
                id_update: id_nombre,
                nombre: update_nombre,
                apellido: update_apellido,
                telefono: update_telefono,
                email: update_email,
                materias: arrayUpdateMaterias,
            }
            // console.log(formUpdateDataAlumno)

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
                        $(".close_modal_update").click(),
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
            $(".materia_update").prop('checked', false)
            setTimeout(function() {
                location.reload();
            }, 2000) // 2000 milisegundos (2 segundos)
        })
    }

    $(".close_modal_update").on("click", function () {
        $('.materia_update').prop('checked', false)
    })

})
