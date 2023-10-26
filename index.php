<?php require "php/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Abraham</title>

    <script src="js/jquery-3.7.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <link href="css/estilos.css" rel="stylesheet">

    <script src="js/only_numbers.js"></script>
    <script src="js/add_name.js"></script>
    <script src="js/create_data.js"></script>
    <script src="js/data_tables.js"></script>
    <script src="js/delete_data.js"></script>
    <script src="js/update_data.js"></script>

    <script src="js/verify_data/verify_ficha.js"></script>
    <script src="js/verify_data/verify_phone.js"></script>
    <script src="js/verify_data/verify_email.js"></script>

<!--    <script src="js/add_materia.js"></script>-->
<!--    <script src="js/verify_data/verify_materia.js"></script>-->
<!--    <script src="js/update_materia.js"></script>-->
<!--    <script src="js/delete_materia.js"></script>-->

</head>
<body>
<h1 class="mt-4 text-center">Lista de Alumnos Registrados</h1>

<div class="container">
    <div class="mt-5 text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAlumno">Nuevo Alumno</button>
<!--        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalFormMateria">Nueva Materia</button>-->
    </div>

    <!-- Modal para Registrar una Materia-->
<!--    <div class="modal fade" id="modalFormMateria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog modal-dialog-centered">-->
<!--            <div class="modal-content bg-dark text-light">-->
<!--                <div class="modal-header">-->
<!--                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos de la Materia</h1>-->
<!--                    <button type="button" class="btn-close bg-danger closeModalMateria" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                </div>-->
<!--                <form action="">-->
<!--                    <div class="modal-body">-->
<!--                        <div class="mb-3">-->
<!--                            <label for="id_alumno" class="form-label fw-bold">Nombre de la materia:</label>-->
<!--                            <div class="mb-3">-->
<!--                                <input type="text" class="form-control form-add-materia mb-2" id="nombre_materia" placeholder="" aria-label="" aria-describedby="verificar_materia">-->
<!--                                <a data-bs-dismiss="modal" class="text-light listaMateria" data-bs-toggle="modal" data-bs-target="#modalMaterias" style="cursor:pointer;">-->
<!--                                    <i class="bi bi-card-list" title="Ver lista de materias registradas"></i>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-info" id="verificar_materia">Verificar</button>-->
<!--                        <button type="button" class="btn btn-danger closeModalMateria" data-bs-dismiss="modal">Cancelar</button>-->
<!--                        <button type="button" class="btn btn-success saveDataMateria">Registrar</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <!-- Modal para Listar las Materias-->
<!--    <div class="modal fade" id="modalMaterias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog modal-dialog-centered">-->
<!--            <div class="modal-content bg-dark text-light">-->
<!--                <div class="modal-header">-->
<!--                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Materias registradas</h1>-->
<!--                    <button type="button" class="btn-close bg-danger closeListaMateria" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <div class="mb-3">-->
<!--                        --><?php
//                        $checks_materias = "SELECT * FROM materia";
//                        $response_materia = mysqli_query($conexion, $checks_materias);
//                        while ($fila_materia = $response_materia->fetch_assoc()) { ?>
<!--                            <div class="row align-items-center pb-1 pt-1">-->
<!--                                <div class="col-9">-->
<!--                                    <h5 id="Materia_--><?php //echo $fila_materia['id_materia'] ?><!--" class="">--><?php //echo $fila_materia['nombre_materia'] ?><!--.</h5>-->
<!--                                </div>-->
<!--                                <div class="col-3">-->
<!--                                    <button id="editarMateria_--><?php //echo $fila_materia['id_materia'] ?><!--" type="button" class="btn btn-info editarMateria"><i class="bi bi-pencil-square"></i></button>-->
<!--                                    <button id="eliminarMateria_--><?php //echo $fila_materia['id_materia'] ?><!--" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <h5 class="mt-3 mb-3">Consulta de alumnos registrados con las materias que tienen asignadas:</h5>
    <table class="table tabla_alumno">
        <thead>
        <tr>
            <th scope="col">Ficha</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">E-mail</th>
            <th scope="col">Materias</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $lista_alumno = "SELECT * FROM alumno";
        $response_alumno = mysqli_query($conexion, $lista_alumno);
        while ($fila_alumno = $response_alumno->fetch_assoc()) {
            ?>
            <tr>
                <th class="align-middle show_id_alumno" scope="row" id="alumno<?php echo $fila_alumno['id_alumno'] ?>"><?php echo $fila_alumno['id_alumno'] ?></th>
                <td class="align-middle show_nombre_alumno" id="nombre<?php echo $fila_alumno['id_alumno'] ?>"><?php echo $fila_alumno['nombre_alumno'] ?></td>
                <td class="align-middle show_apellido_alumno" id="apellido<?php echo $fila_alumno['id_alumno'] ?>"><?php echo $fila_alumno['apellido_alumno'] ?></td>
                <td class="align-middle"><?php echo $fila_alumno['telefono_alumno'] ?></td>
                <td class="align-middle"><?php echo $fila_alumno['email_alumno'] ?></td>
                <td class="align-middle show_materias" id="materias<?php echo $fila_alumno['id_alumno'] ?>"><?php echo $fila_alumno['materia_alumno'] ?></td>
                <td class="align-middle">
                    <button type="button" class="btn btn-info show_modal_update" data-bs-toggle="modal" data-bs-target="#modalUpdate_<?php echo $fila_alumno['id_alumno'] ?>" title="Actualizar datos de <?php echo $fila_alumno['nombre_alumno'] ?> <?php echo $fila_alumno['apellido_alumno'] ?>" id="update<?php echo $fila_alumno['id_alumno'] ?>"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-danger delete_data" id="eliminar<?php echo $fila_alumno['id_alumno'] ?>" title="Eliminar a <?php echo $fila_alumno['id_alumno'] ?>"><i class="bi bi-trash"></i></button>
                </td>
            </tr>

            <!-- Modal para Actualizar datos del Alumno-->
            <div class="modal fade" id="modalUpdate_<?php echo $fila_alumno['id_alumno'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark text-light">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bolder" id="staticBackdropLabel"><?php echo $fila_alumno['nombre_alumno'] ?><?php echo $fila_alumno['apellido_alumno'] ?></h1>
                            <button type="button" class="btn-close bg-danger xModal<?php echo $fila_alumno['id_alumno'] ?>" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="">
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="update_id_<?php echo $fila_alumno['id_alumno'] ?>" value="<?php echo $fila_alumno['id_alumno'] ?>">

                                <div class="mb-3">
                                    <label for="update_nombre_<?php echo $fila_alumno['id_alumno'] ?>" class="form-label fw-bold">Nombre:</label>
                                    <input type="text" class="form-control" id="update_nombre_<?php echo $fila_alumno['id_alumno'] ?>" value="<?php echo $fila_alumno['nombre_alumno'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_apellido_<?php echo $fila_alumno['id_alumno'] ?>" class="form-label fw-bold">Apellidos:</label>
                                    <input type="text" class="form-control" id="update_apellido_<?php echo $fila_alumno['id_alumno'] ?>" value="<?php echo $fila_alumno['apellido_alumno'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_telefono_<?php echo $fila_alumno['id_alumno'] ?>" class="form-label fw-bold">Teléfono/Celular:</label>
                                    <input type="email" class="form-control field_only_numbers" id="update_telefono_<?php echo $fila_alumno['id_alumno'] ?>" value="<?php echo $fila_alumno['telefono_alumno'] ?>" minlength="10" maxlength="10">
                                </div>

                                <div class="mb-3">
                                    <label for="update_email_<?php echo $fila_alumno['id_alumno'] ?>" class="form-label fw-bold">E-mail:</label>
                                    <input type="email" class="form-control" id="update_email_<?php echo $fila_alumno['id_alumno'] ?>" value="<?php echo $fila_alumno['email_alumno'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Materias:</label>
                                    <div class="row justify-content-start">
                                        <?php
                                        $checks_materias = "SELECT * FROM materia";
                                        $response_materia = mysqli_query($conexion, $checks_materias);
                                        while ($fila_materia = $response_materia->fetch_assoc()) { ?>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input materia_update_<?php echo $fila_alumno['id_alumno'] ?>" type="checkbox" value="<?php echo $fila_materia['nombre_materia'] ?>">
                                                    <label class="form-check-label labelMateriaUpdate_<?php echo $fila_alumno['id_alumno'] ?>"><?php echo $fila_materia['nombre_materia'] ?>.</label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger closeModalUpdate_<?php echo $fila_alumno['id_alumno'] ?>" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success updateData_<?php echo $fila_alumno['id_alumno'] ?>">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal para Registrar un nuevo Alumno-->
<div class="modal fade" id="modalFormAlumno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos del Alumno</h1>
                <button type="button" class="btn-close bg-danger close_modal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_alumno" class="form-label fw-bold">Ficha:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-alumno field_only_numbers" id="id_alumno" minlength="1" maxlength="4" placeholder="" aria-label="" aria-describedby="verificar_id">
                            <button class="btn btn-info" type="button" id="verificar_id">Verificar</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nombre_alumno" class="form-label fw-bold">Nombre:</label>
                        <input type="text" class="form-control form-control-alumno" id="nombre_alumno">
                    </div>

                    <div class="mb-3">
                        <label for="apellidos_alumno" class="form-label fw-bold">Apellidos:</label>
                        <input type="text" class="form-control form-control-alumno" id="apellidos_alumno">
                    </div>

                    <div class="mb-3">
                        <label for="telefono_alumno" class="form-label fw-bold">Tel/Cel:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-alumno field_only_numbers" id="telefono_alumno" minlength="10" maxlength="10" placeholder="" aria-label="" aria-describedby="verificar_telefono">
                            <button class="btn btn-info" type="button" id="verificar_telefono">Verificar</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email_alumno" class="form-label fw-bold">E-mail:</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-alumno" id="email_alumno" placeholder="" aria-label="" aria-describedby="verificar_email">
                            <button class="btn btn-info" type="button" id="verificar_email">Verificar</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Materias:</label>
                        <div class="row justify-content-start">
                            <?php
                            $checks_materias = "SELECT * FROM materia";
                            $response_materia = mysqli_query($conexion, $checks_materias);
                            while ($fila_materia = $response_materia->fetch_assoc()) {
                                ?>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input checkbox-materia" type="checkbox" value="<?php echo $fila_materia['nombre_materia'] ?>" id="materia<?php echo $fila_materia['id_materia'] ?>" name="miArray[]">
                                        <label class="form-check-label" for="materia<?php echo $fila_materia['id_materia'] ?>"><?php echo $fila_materia['nombre_materia'] ?>.</label>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger close_modal" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success save_data">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
