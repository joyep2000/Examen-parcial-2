function init() {
    $('#inscripciones_form').on('submit', (e) => {
        guardayeditarInscripciones(e);
    })
}

$().ready(() => {
    cargaTablaInscripciones();
});
var cargaTablaInscripciones = () => {
    var html = '';
    $.post('../../controllers/inscripciones.controller.php?op=todos',
        (listainscripciones) => {
            listainscripciones = JSON.parse(listainscripciones);
            $.each(listainscripciones, (index, inscripciones) => {
                html +=
                    `<tr>` +
                    `<td>${index + 1}</td>` +
                    `<td>${inscripciones.id_inscripciones}</td>` +
                    `<td>${inscripciones.id_Estudiantes}</td>` +
                    `<td>${inscripciones.id_curso}</td>` +
                    `<td>${inscripciones.fecha}</td>` +
                    `<td>` +
                    `<button class = 'btn btn-success' onclick ='uno(${inscripciones.id_inscripciones})'>Editar</button>` +
                    `<button class = 'btn btn-danger'onclick ='eliminar(${inscripciones.id_inscripciones})'>Eliminar</button>` +
                    `</td>` +
                    `</tr>`;
            });
            $('#TablaInscripciones').html(html);
        }
    );
};

var guardayeditarInscripciones = (e) => {
    e.preventDefault();
    var url = '';
    var form_Data = new FormData($('#inscripciones_form')[0]);
    var id_inscripciones = document.getElementById('id_inscipciones').value;
    if (id_inscripciones === undefined || id_inscripciones === "") {
        url = "../../controllers/inscripciones.controller.php?op=insertar";
    } else {
        url = "../../controllers/inscripciones.controller.php?op=actualizar";
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
                Swal.fire('Incripciones', 'Se guardo con exito', 'success');
                limpiar();
                cargaTablaInscripciones();
            } else {
                alert('ocurrio un error al guardar. ' + respuesta);
            }
        }
    });
}

var uno = (id_inscripciones) => {
    $.POST('../../controllers/estudiantes.controller.php?op=uno', { id_inscripciones: id_inscripciones }, (res) => {
        res = JSON.parse(res);
        $('#id_inscripciones').val(res.id_inscripciones);
        $('#id_Estudiantes').val(res.id_Estudiantes);
        $('#id_curso').val(res.id_curso);
        $('#fecha').val(res.fecha);
    })
    document.getElementById('titulModalInscripciones').innerHTML = "Editar Inscripcion";
    $('#modalInscripciones').modal('show');

}

var eliminar = (id_inscripciones) => {
    Swal.fire({
        title: 'Inscipciones',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/inscripciones.controller.php?op=eliminar', {
                id_inscripciones:id_inscripciones
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Inscripciones', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaInscripciones();
                }

            })
        }
    })
}

var limpiar = () => {
    $('#id_inscripciones').val('');
    $('#id_Estudiantes').val('');
    $('#id_curso').val('');
    $('#fecha').val('');
    $('#modalInscripciones').modal('hide');
    document.getElementById('titulModalInscripciones').innerHTML = "Nueva Inscripcion";

};

init();