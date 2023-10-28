let materiaNoActualizada = "", materiaActualizada = ""
$(document).ready(function () {
    let tablaMaterias = $("#tablaMaterias").DataTable({
        language: {
            search: "Buscar: ",
            paginate: {
                previous: "<i class=\"bi bi-chevron-double-left\"></i>",
                next: "<i class=\"bi bi-chevron-double-right\"></i>",
            },
            // info: "Mostrando: _START_ a _END_ de _TOTAL_",
            lengthMenu: "Mostrar _MENU_ materias.",
        },
        pageLength: 4,
        lengthMenu: [2, 4, 6, 8, 10],
        initComplete: function (settings, json) {
            $("#searchMateria")
                .append($("<span class='fs-5'>").text("Buscar: "))
                .append($(".dataTables_filter input").addClass("form-control text-center tabla-materias-form-input d-inline-block"))

            $("#selectMaterias")
                .append($("<span class='fs-5'>").text("Mostrar de a "))
                .append($(".dataTables_length select").addClass("form-select text-center tabla-materias-form-select d-inline-block"))
                .append($("<span class='fs-5'>").text(" materias."))
        },
        columnDefs: [
            { targets: 1, orderable: false } // Deshabilita la ordenación en la columna 2 (índice 1)
        ]
    })

    $("#tablaMaterias_paginate").addClass("mt-3")

    // Escucha eventos de paginación y llama a la función para actualizar la paginación
    tablaMaterias.on("draw", function () {
        let info = tablaMaterias.page.info()
        $("#materiasRegistradasH1").html(`Materias registradas: ${info.recordsTotal}`)
        $("#paginación").html(`Mostrando materias: ${(info.start + 1)} - ${info.end}`)
    })

    // Llama a la función para actualizar la paginación cuando se carga la tabla por primera vez
    tablaMaterias.draw()

    let arrayUpdateMateria = []

    $(".listaMateria").on("click", function () {
        console.log(tablaMaterias.page.info().lengthMenu)
        $('.editarMateria').each(function () {
            arrayUpdateMateria.push($(this).attr('id'))
        })

        for (let i = 0; i < arrayUpdateMateria.length; i++) {
            let ID_EDITAR_MATERIA = arrayUpdateMateria[i]
            let H5_MATERIA = $(`#Materia_${ID_EDITAR_MATERIA.split("_")[1]}`)

            $(`.${ID_EDITAR_MATERIA}`).on("click", function () {
                $(".closeListaMateria").click()
                let ID_UPDATE_MATERIA = ID_EDITAR_MATERIA.split("_")[1]
                let UPDATE_MATERIA = H5_MATERIA.html().replace(".", "")

                materiaNoActualizada = UPDATE_MATERIA

                Swal.fire({
                    background: "#000",
                    position: 'center',
                    title: `Cambiar ${UPDATE_MATERIA} por:`,
                    input: 'text',
                    showConfirmButton: true,
                    confirmButtonColor: '#19980b',
                    confirmButtonText: 'SÍ',
                    showCancelButton: true,
                    cancelButtonColor: '#910018',
                    cancelButtonText: 'No',
                    inputAttributes: {
                        style: 'text-align: center;',
                        maxlength: 30,
                        autocapitalize: 'off',
                        autocorrect: 'off',
                    }, inputValidator: resultado => {
                        if (!resultado) {
                            return "Campo Vacío"
                        }
                    }
                }).then((RESULT) => {
                    if (RESULT.isConfirmed) {
                        let formUpdateMateria = {
                            id_materia: ID_UPDATE_MATERIA,
                            nombre_materia: RESULT.value,
                        }
                        $.ajax({
                            type: "POST",
                            url: "php/add_materia/update_materia.php",
                            data: formUpdateMateria,
                            success: function (response) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(
                                    H5_MATERIA.html(`${RESULT.value}.`),
                                    $(`#materia${ID_UPDATE_MATERIA}`).val(`${RESULT.value}`),
                                    $(`label[for='materia${ID_UPDATE_MATERIA}']`).text(`${RESULT.value}.`),

                                    materiaActualizada = RESULT.value,
                                    $(".listaMateriaDirecta").click(),
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
                    } else {
                        $(".listaMateriaDirecta").click()
                    }
                })
            })
        }
    })

    $(".regresarFormMateria").on("click", function () {
        $(".modalFormMateria").click()
    })
})
