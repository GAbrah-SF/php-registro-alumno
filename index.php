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

</head>
<body>
<h1 class="mt-4 text-center">Lista de Alumnos Registrados</h1>

<div class="container">
    <div class="mt-5 text-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAlumno">
            Nuevo Alumno
        </button>
    </div>

    <h5 class="mt-3 mb-3">Consulta de alumnos registrados con las materias que tienen asignadas:</h5>
    <table class="table tabla_alumno">
        <thead>
        <tr>
            <th scope="col">#</th>
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
                <td>
                    <button type="button" class="btn btn-info show_modal_update"
                            data-bs-toggle="modal" data-bs-target="#modalUpdate_<?php echo $fila_alumno['id_alumno'] ?>"
                            title="Actualizar datos de <?php echo $fila_alumno['nombre_alumno'] ?> <?php echo $fila_alumno['apellido_alumno'] ?>"
                            id="<?php echo $fila_alumno['id_alumno'] ?>">
                        <i class="bi bi-archive"></i></button>
                    <button type="button" class="btn btn-danger delete_data" id="eliminar<?php echo $fila_alumno['id_alumno'] ?>"
                            title="Eliminar a <?php echo $fila_alumno['id_alumno'] ?>">
                        <i class="bi bi-trash"></i></button>
                </td>
            </tr>

            <!-- Modal para Actualizar datos del Alumno-->
            <div class="modal fade" id="modalUpdate_<?php echo $fila_alumno['id_alumno'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bolder" id="staticBackdropLabel"><?php echo $fila_alumno['nombre_alumno'] ?> <?php echo $fila_alumno['apellido_alumno'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="formAlumnoUpdate">
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="update_id_<?php echo $fila_alumno['id_alumno'] ?>" value="<?php echo $fila_alumno['id_alumno'] ?>">

                                <div class="mb-3">
                                    <label for="update_nombre" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="update_nombre_<?php echo $fila_alumno['id_alumno'] ?>"
                                           value="<?php echo $fila_alumno['nombre_alumno'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_apellido" class="form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="update_apellido_<?php echo $fila_alumno['id_alumno'] ?>"
                                           value="<?php echo $fila_alumno['apellido_alumno'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_telefono" class="form-label">Teléfono/Celular:</label>
                                    <input type="email" class="form-control field_only_numbers" id="update_telefono_<?php echo $fila_alumno['id_alumno'] ?>"
                                           value="<?php echo $fila_alumno['telefono_alumno'] ?>"
                                           minlength="10" maxlength="10">
                                </div>

                                <div class="mb-3">
                                    <label for="update_email" class="form-label">E-mail:</label>
                                    <input type="email" class="form-control" id="update_email_<?php echo $fila_alumno['id_alumno'] ?>"
                                    value="<?php echo $fila_alumno['email_alumno'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Materias:</label>
                                    <div class="row justify-content-start">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_1_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Teorías de aprendizaje">
                                                <label class="form-check-label" for="materiaUpdate_1_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Teorías de aprendizaje.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_2_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Filosofía de la educación">
                                                <label class="form-check-label" for="materiaUpdate_2_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Filosofía de la educación.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_3_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Estrategias de aprendizaje">
                                                <label class="form-check-label" for="materiaUpdate_3_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Estrategias de aprendizaje.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_4_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Comunicación educativa">
                                                <label class="form-check-label" for="materiaUpdate_4_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Comunicación educativa.
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_5_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Metodologías para la enseñanza">
                                                <label class="form-check-label" for="materiaUpdate_5_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Metodologías para la enseñanza.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_6_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Teoría y desarrollo curricular">
                                                <label class="form-check-label" for="materiaUpdate_6_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Teoría y desarrollo curricular.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_7_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Evaluación del aprendizaje">
                                                <label class="form-check-label" for="materiaUpdate_7_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Evaluación del aprendizaje.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input materia_update"
                                                       id="materiaUpdate_8_<?php echo $fila_alumno['id_alumno'] ?>"
                                                       type="checkbox" value="Diseño de programas de enseñanza">
                                                <label class="form-check-label" for="materiaUpdate_8_<?php echo $fila_alumno['id_alumno'] ?>">
                                                    Diseño de programas de enseñanza.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger close_modal_update" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success" id="update_data_<?php echo $fila_alumno['id_alumno'] ?>">Actualizar</button>
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
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos del Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="formAlumno">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre_alumno" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_alumno">
                    </div>

                    <div class="mb-3">
                        <label for="apellidos_alumno" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos_alumno">
                    </div>

                    <div class="mb-3">
                        <label for="telefono_alumno" class="form-label">Tel/Cel:</label>
                        <input type="email" class="form-control field_only_numbers" id="telefono_alumno" minlength="10"
                               maxlength="10">
                    </div>

                    <div class="mb-3">
                        <label for="email_alumno" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email_alumno">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Materias:</label>
                        <div class="row justify-content-start">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox" value="Teorías de aprendizaje"
                                           id="materia1" name="miArray[]">
                                    <label class="form-check-label" for="materia1">
                                        Teorías de aprendizaje.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox" value="Filosofía de la educación"
                                           id="materia2" name="miArray[]">
                                    <label class="form-check-label" for="materia2">
                                        Filosofía de la educación.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox" value="Estrategias de aprendizaje"
                                           id="materia3" name="miArray[]">
                                    <label class="form-check-label" for="materia3">
                                        Estrategias de aprendizaje.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox" value="Comunicación educativa"
                                           id="materia4" name="miArray[]">
                                    <label class="form-check-label" for="materia4">
                                        Comunicación educativa.
                                    </label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox"
                                           value="Metodologías para la enseñanza" id="materia5" name="miArray[]">
                                    <label class="form-check-label" for="materia5">
                                        Metodologías para la enseñanza.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox"
                                           value="Teoría y desarrollo curricular" id="materia6" name="miArray[]">
                                    <label class="form-check-label" for="materia6">
                                        Teoría y desarrollo curricular.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox" value="Evaluación del aprendizaje"
                                           id="materia7" name="miArray[]">
                                    <label class="form-check-label" for="materia7">
                                        Evaluación del aprendizaje.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input save_materia" type="checkbox"
                                           value="Diseño de programas de enseñanza" id="materia8" name="miArray[]">
                                    <label class="form-check-label" for="materia8">
                                        Diseño de programas de enseñanza.
                                    </label>
                                </div>
                            </div>
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
