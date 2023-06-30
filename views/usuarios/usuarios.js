function init() {
    $('#usuarios_form').on('submit', (e) => {
        guardayeditarUsuarios(e);
    })
}

$().ready(() => {
    cargaTablaUsuarios();
});
var cargaTablaUsuarios = () => {
    var html = '';
    $.post('../../controllers/usuario.controller.php?op=todos',
        (listausuarios) => {
            listausuarios = JSON.parse(listausuarios);
            $.each(listausuarios, (index, usuario) => {
                html +=
                    `<tr>` +
                    `<td>${index + 1}</td>` +
                    `<td>${usuario.Nombres}</td>` +
                    `<td>${usuario.Apellidos}</td>` +
                    `<td>${usuario.correo}</td>` +
                    `<td>` +
                    `<button class = 'btn btn-success'>Editar</button>` +
                    `<button class = 'btn btn-danger'>Eliminar</button>` +
                    `</td>` +
                    `</tr>`;
            });
            $('#TablaUsuarios').html(html);
        });
};

var guardayeditarUsuarios = (e) => {
    e.preventDefault();
    var url = '';
    var form_Data = new FormData($('#usuarios_form')[0]);
    var idUsaurio = document.getElementById('idUsaurio').value;
    if (idUsaurio === undefined || idUsaurio === "") {
        url = "../../controllers/usuario.controller.php?op=insertar";
    } else {
        url = "../../controllers/usuario.controller.php?op=actualizar";
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
            if (respuesta == 'ok') {
                alert('Se guardo con exito');
                limpiar();
                cargaTablaUsuarios();
            } else {
                alert('ocurrio un error al guardar. ' + respuesta);
            }
        },
    });
};
var limpiar = () => {
    document.getElementById('idUsaurio').value = '';
    document.getElementById('Nombres')
    $('#Apellidos').val('');
    $('#correo').val('');
    $('#contrasenia').val('');
    $('#modalUsuarios').modal('hide');

};

init();