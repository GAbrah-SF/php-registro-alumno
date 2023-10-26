$(document).ready(function () {
    $(".save_data").on("click", function (e) {
        e.preventDefault()

        let ficha = $("#id_alumno").val()
        let nombre = $("#nombre_alumno").val()
        let apellido = $("#apellidos_alumno").val()
        let telefono = $("#telefono_alumno").val()
        let email = $("#email_alumno").val()

        let materiaSeleccionada = $('.checkbox-materia:checked').map(function () {
            return this.value
        }).get()

        let materias = materiaSeleccionada.join(', ') // Une los elementos con comas y espacio

        let formDataAlumno = {
            ficha: ficha,
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            email: email,
            materias: materias,
        }

        $.ajax({
            type: "POST",
            url: "php/create_data.php",
            data: formDataAlumno,
            success: function (response) {
                swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: (response),
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    $(".close_modal").click(),
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
        setTimeout(function () {
            location.reload();
        }, 2000) // 2000 milisegundos (2 segundos)
    })

    $(".close_modal").on("click", function () {
        $(".form-control-alumno").val("")
        $('.checkbox-materia').prop('checked', false)
    })
})
