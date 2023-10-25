$(document).ready(function () {
    let id_delete = [], id_nombre = [], nombre = [], apellido = []

    $('.delete_data').each(function () {
        id_delete.push($(this).attr('id'));
    })

    $('.show_id_alumno').each(function () {
        id_nombre.push($(this).attr('id'));
    })

    $('.show_nombre_alumno').each(function () {
        nombre.push($(this).attr('id'));
    })

    $('.show_apellido_alumno').each(function () {
        apellido.push($(this).attr('id'));
    })

    for (let i = 0, j = 0, k = 0, l = 0;
         i < id_delete.length, j < id_nombre.length, k < nombre.length, l < apellido.length;
         i++, j++, k++, l++) {
        let boton_eliminar = $(`#${id_delete[i]}`)
        let show_id_alumno = $(`#${id_nombre[j]}`).text()
        let show_nombre_alumno = $(`#${nombre[k]}`).text()
        let show_apellido_alumno = $(`#${apellido[l]}`).text()


        boton_eliminar.on("click", function () {
            swal.fire({
                background: "#000",
                position: 'center',
                icon: 'warning',
                title: `Eliminar a\n${show_nombre_alumno} ${show_apellido_alumno}`,
                showConfirmButton: true,
                confirmButtonColor: '#19980b',
                confirmButtonText: 'SÍ',
                showCancelButton: true,
                cancelButtonColor: '#910018',
                cancelButtonText: 'NO',
                // timer: 2000
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "php/delete_data.php",
                        type: 'POST',
                        data: {id: show_id_alumno},
                        success: function (response) {
                            swal.fire({
                                position: 'center',
                                icon: 'success',
                                background: "#000",
                                title: (response),
                                showConfirmButton: false,
                                timer: 2500
                            }).then(
                                setTimeout(function () {
                                    location.reload();
                                }, 2000) // 2000 milisegundos (2 segundos)
                            )
                        },
                    })
                }
            })

        })
    }
})
