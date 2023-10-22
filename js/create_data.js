$(document).ready(function () {
    $(".save_data").on("click", function (e) {
        e.preventDefault()

        // Obtén los valores de los campos de entrada
        let nombre = $("#nombre_alumno").val()
        let apellido = $("#apellidos_alumno").val()
        let telefono = $("#telefono_alumno").val()
        let email = $("#email_alumno").val()

        // Selecciona todos los elementos con la clase "checkbox" que estén marcados
        let materiaSeleccionada = $('.save_materia:checked').map(function () {
            return this.value
        }).get()

        let materias = materiaSeleccionada.join(', ') // Une los elementos con comas y espacio
        // console.log(materias) // Resultado: "Hola, Mundo, JavaScript"

        // Crea un objeto JavaScript con los datos
        let formDataAlumno = {
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            email: email,
            materias: materias,
        }
        // console.log(formDataAlumno)

        // Envía los datos al script PHP utilizando AJAX
        $.ajax({
            type: "POST",
            url: "php/create_data.php",
            data: formDataAlumno,
            success: function (response) {
                // Maneja la respuesta del servidor, si es necesario
                swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: (response),
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    $(".close_modal").click(),
                )

                // Actualiza la tabla

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
        setTimeout(function () {
            location.reload();
        }, 2000) // 2000 milisegundos (2 segundos)
    })

    $(".close_modal").on("click", function () {
        $(".form-control").val("")
        $('.form-check-input').prop('checked', false)
    })

})
