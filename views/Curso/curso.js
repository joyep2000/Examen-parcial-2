function init() {
    $('#curso_form').on('submit', (e) => {
        guardayeditarCurso(e);
    })
}

$().ready(() => {
    cargaTablaCurso();
});
var cargaTablaCurso = () => {
    var html = '';
    $.post('../../controllers/curso.controller.php?op=todos',
        (listacursos) => {
            listaecursos = JSON.parse(listacursos);
            $.each(listacursos, (index, cursos) => {
                html +=
                    `<tr>` +
                    `<td>${index + 1}</td>` +
                    `<td>${cursos.id_curso}</td>` +
                    `<td>${cursos.idioma}</td>` +
                    `<td>${cursos.id_profesor}</td>` +
                    `<td>` +
                    `<button class = 'btn btn-success' onclick ='uno(${cursos.id_curso})'>Editar</button>` +
                    `<button class = 'btn btn-danger'onclick ='eliminar(${cursos.id_curso})'>Eliminar</button>` +
                    `</td>` +
                    `</tr>`;
            });
            $('#TablaCurso').html(html);
        }
    );
};

var guardayeditarCurso = (e) => {
    e.preventDefault();
    var url = '';
    var form_Data = new FormData($('#curso_form')[0]);
    var id_curso = document.getElementById('id_curso').value;
    if (id_curso === undefined || id_curso === "") {
        url = "../../controllers/curso.controller.php?op=insertar";
    } else {
        url = "../../controllers/curso.controller.php?op=actualizar";
    }

    for (var pair of form_Data.entries()) {
        console.log(pair[0] + ',' + pair[1]);
    }

    $.ajax({
        url: url,
        type: "POST",
        data: form_Data,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            respuesta = JSON.parse(respuesta);
            if (respuesta === 'ok') {
                Swal.fire('Cursos', 'Se guardo con exito', 'success');
                limpiar();
                cargaTablaCurso();
            } else {
                alert('ocurrio un error al guardar. ' + respuesta);
            }
        }
    });
}

var uno = (id_curso) => {
    $.POST('../../controllers/curso.controller.php?op=uno', { id_curso: id_curso }, (res) => {
        res = JSON.parse(res);
        $('#id_curso').val(res.id_curso);
        $('#idioma').val(res.idioma);
        $('#id_profesor').val(res.id_profesor)
    })
    document.getElementById('titulModalCurso').innerHTML = "Editar Curso";
    $('#modalCurso').modal('show');

}

var eliminar = (id_curso) => {
    Swal.fire({
        title: 'Cursos',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/curso.controller.php?op=eliminar', {
                id_curso: id_curso
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Cursos', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaCurso();
                }

            })
        }
    })
}

var limpiar = () => {
    $('#id_curso').val('');
    $('#idioma').val('');
    $('#id_profesor').val('');
    $('#modalCurso').modal('hide');
    document.getElementById('titulModalCurso').innerHTML = "Nuevo Curso";

};

init();