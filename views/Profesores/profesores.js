function init() {
    $('#profesores_form').on('submit', (e) => {
        guardayeditarProfesores(e);
    })
}

$().ready(() => {
    cargaTablaProfesores();
});
var cargaTablaProfesores = () => {
    var html = '';
    $.post('../../controllers/profesores.controller.php?op=todos',
        (listaprofesores) => {
            listaprofesores = JSON.parse(listaprofesores);
            $.each(listaprofesores, (index, profesores) => {
                html +=
                    `<tr>` +
                    `<td>${index + 1}</td>` +
                    `<td>${profesores.id_profesor}</td>` +
                    `<td>${profesores.Nombre}</td>` +
                    `<td>` +
                    `<button class = 'btn btn-success' onclick ='uno(${profesores.id_profesor})'>Editar</button>` +
                    `<button class = 'btn btn-danger'onclick ='eliminar(${profesores.id_profesor})'>Eliminar</button>` +
                    `</td>` +
                    `</tr>`;
            });
            $('#TablaProfesores').html(html);
        }
    );
};

var guardayeditarProfesores = (e) => {
    e.preventDefault();
    var url = '';
    var form_Data = new FormData($('#profesores_form')[0]);
    var id_profesor = document.getElementById('id_profesor').value;
    if (id_profesor === undefined || id_profesor === "") {
        url = "../../controllers/profesores.controller.php?op=insertar";
    } else {
        url = "../../controllers/profesores.controller.php?op=actualizar";
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
                Swal.fire('Profesores', 'Se guardo con exito', 'success');
                limpiar();
                cargaTablaProfesores();
            } else {
                alert('ocurrio un error al guardar. ' + respuesta);
            }
        }
    });
}

var uno = (id_profesor) => {
    $.POST('../../controllers/profesores.controller.php?op=uno', { id_profesor: id_profesor }, (res) => {
        res = JSON.parse(res);
        $('#id_profesor').val(res.id_profesor);
        $('#Nombres').val(res.Nombres);
    })
    document.getElementById('titulModalProfesores').innerHTML = "Editar Profesores";
    $('#modalProfesores').modal('show');

}

var eliminar = (id_profesor) => {
    Swal.fire({
        title: 'Profesores',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/profesores.controller.php?op=eliminar', {
                id_profesor: id_profesor
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Profesores', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaProfesores();
                }

            })
        }
    })
}

var limpiar = () => {
    $('#id_profesor').val('');
    $('#Nombres').val('');
    $('#modalProfesores').modal('hide');
    document.getElementById('titulModalProfesores').innerHTML = "Nuevo Profesor";

};

init();