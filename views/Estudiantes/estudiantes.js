function init() {
    $('#estudiantes_form').on('submit', (e) => {
        guardayeditarEstudiantes(e);
    })
}

$().ready(() => {
    cargaTablaEstudiantes();
});
var cargaTablaEstudiantes = () => {
    var html = '';
    $.post('../../controllers/estudiantes.controller.php?op=todos',
        (listaestudiantes) => {
            listaestudiantes = JSON.parse(listaestudiantes);
            $.each(listaestudiantes, (index, estudiantes) => {
                html +=
                    `<tr>` +
                    `<td>${index + 1}</td>` +
                    `<td>${estudiantes.id_Estudiantes}</td>` +
                    `<td>${estudiantes.Nombre}</td>` +
                    `<td>` +
                    `<button class = 'btn btn-success' onclick ='uno(${estudaintes.id_Estudiantes})'>Editar</button>` +
                    `<button class = 'btn btn-danger'onclick ='eliminar(${estudaintes.id_Estudiantes})'>Eliminar</button>` +
                    `</td>` +
                    `</tr>`;
            });
            $('#TablaEstudiantes').html(html);
        }
    );
};

var guardayeditarEstudiantes = (e) => {
    e.preventDefault();
    var url = '';
    var form_Data = new FormData($('#estudiantes_form')[0]);
    var id_Estudiantes = document.getElementById('id_Estudiantes').value;
    if (id_Estudiantes === undefined || id_Estudiantes === "") {
        url = "../../controllers/estudiantes.controller.php?op=insertar";
    } else {
        url = "../../controllers/estudiantes.controller.php?op=actualizar";
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
                Swal.fire('Estudiantes', 'Se guardo con exito', 'success');
                limpiar();
                cargaTablaEstudiantes();
            } else {
                alert('ocurrio un error al guardar. ' + respuesta);
            }
        }
    });
}

var uno = (id_Estudiantes) => {
    $.POST('../../controllers/estudiantes.controller.php?op=uno', { id_Estudiantes: id_Estudiantes }, (res) => {
        res = JSON.parse(res);
        $('#id_Estudiantes').val(res.id_Estudiantes);
        $('#Nombre').val(res.Nombre);
    })
    document.getElementById('titulModalEstudiantes').innerHTML = "Editar Estudiante";
    $('#modalEstudiantes').modal('show');

}

var eliminar = (id_Estudiantes) => {
    Swal.fire({
        title: 'Estudiantes',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/estudiantes.controller.php?op=eliminar', {
                id_Estudiantes: id_Estudiantes
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Estudiantes', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaEstudiantes();
                }

            })
        }
    })
}

var limpiar = () => {
    $('#id_Estudiantes').val('');
    $('#Nombre').val('');
    $('#modalEstudiantes').modal('hide');
    document.getElementById('titulModalEstudiantes').innerHTML = "Nuevo Estudiante";

};

init();