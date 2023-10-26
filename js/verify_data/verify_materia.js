$(document).ready(function () {
    $("#verificar_materia").on("click", function () {
        let nombre_materia = $('#nombre_materia').val()

        if (nombre_materia === "") {
            swal.fire({
                background: "#000",
                position: 'center',
                icon: 'warning',
                title: `Ingresa una Materia`,
                showConfirmButton: false,
                timer: 2000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "php/verify_data/verify_materia.php",
                data: {materia: nombre_materia},
                success: function (respuesta) {
                    if (respuesta === "Materia registrada") {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'error',
                            title: `Materia registrada`,
                            showConfirmButton: false,
                            timer: 2000
                        })

                    } else {
                        swal.fire({
                            background: "#000",
                            position: 'center',
                            icon: 'success',
                            title: `Materia no registrada`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            })
        }
    })
})
