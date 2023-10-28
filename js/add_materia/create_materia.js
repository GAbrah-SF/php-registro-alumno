$(document).ready(function () {
    $(".saveDataMateria").on("click", function (e) {
        e.preventDefault()

        let formDataMateria = {
            materia: $("#nombre_materia").val(),
        }

        $.ajax({
            type: "POST",
            url: "php/add_materia/create_materia.php",
            data: formDataMateria,
            success: function (response) {
                swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: (response),
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    $(".closeModalMateria").click(),
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
        }, 2000)
    })

    $(".closeModalMateria").on("click", function () {
        $(".form-add-materia").val("")
    })
})
