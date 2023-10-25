$(document).ready(function () {
    $('#verificar_id').on("click", function () {
        let ficha = $('#id_alumno').val()

        if (ficha === "") {
            swal.fire({
                background: "#000",
                position: 'center',
                icon: 'warning',
                title: `Ingresa una ficha`,
                showConfirmButton: false,
                timer: 2000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "php/verify_data/verify_ficha.php",
                data: { ficha: ficha },
                success: function (respuesta) {
                    // Maneja la respuesta del servidor (correo existe o no existe)
                    if (respuesta === "La ficha ya está registrada") {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'error',
                            title: `Ficha no disponible`,
                            showConfirmButton: false,
                            timer: 2000
                        })

                    } else {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'success',
                            title: `Ficha Disponible`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            })
        }
    })
})
