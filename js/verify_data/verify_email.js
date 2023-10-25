$(document).ready(function () {
    $('#verificar_email').on("click", function () {
        let email = $('#email_alumno').val()

        if (email === "") {
            swal.fire({
                background: "#000",
                position: 'center',
                icon: 'warning',
                title: `Ingresa un Correo Electrónico`,
                showConfirmButton: false,
                timer: 2000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "php/verify_data/verify_email.php",
                data: { email: email },
                success: function (respuesta) {
                    if (respuesta === "El E-mail ya está registrado") {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'error',
                            title: `E-mail no disponible`,
                            showConfirmButton: false,
                            timer: 2000
                        })

                    } else {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'success',
                            title: `E-mail Disponible`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            })
        }
    })
})
