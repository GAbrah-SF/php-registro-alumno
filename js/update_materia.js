// $(document).ready(function () {
//     let arrayUpdateMateria = []
//
//     $(".listaMateria").on("click", function () {
//         $('.editarMateria').each(function () {
//             arrayUpdateMateria.push($(this).attr('id'))
//         })
//
//         for (let i = 0; i < arrayUpdateMateria.length; i++) {
//             let ID_EDITAR_MATERIA = arrayUpdateMateria[i]
//             let H5_MATERIA = $(`#Materia_${ID_EDITAR_MATERIA.split("_")[1]}`)
//
//             $(`#${ID_EDITAR_MATERIA}`).on("click", function () {
//                 let ID_UPDATE_MATERIA = ID_EDITAR_MATERIA.split("_")[1]
//                 let UPDATE_MATERIA = H5_MATERIA.html().replace(".", "")
//
//                 console.log(ID_EDITAR_MATERIA)
//                 console.log(ID_UPDATE_MATERIA)
//                 console.log(UPDATE_MATERIA)
//
//             })
//         }
//
//     })
//
// })