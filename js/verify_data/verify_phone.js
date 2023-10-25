$(document).ready(function () {
    $('#verificar_telefono').on("click", function () {
        let phone = $('#telefono_alumno').val()

        if (phone === "") {
            swal.fire({
                background: "#000",
                position: 'center',
                icon: 'warning',
                title: `Ingresa un Núm. de Teléfono o Celular`,
                showConfirmButton: false,
                timer: 2000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "php/verify_data/verify_phone.php",
                data: { phone: phone },
                success: function (respuesta) {
                    // Maneja la respuesta del servidor (correo existe o no existe)
                    if (respuesta === "El teléfono ya está registrado") {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'error',
                            title: `Teléfono no disponible`,
                            showConfirmButton: false,
                            timer: 2000
                        })

                    } else {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'success',
                            title: `Teléfono Disponible`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            })
        }
    })
})
