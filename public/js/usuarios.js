serve = base_path;
editar_usuario = 0;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
tippy('[data-tippy-content]');
// const FROM_PATTERN = "YYYY-MM-DD HH:mm:ss.SSS";
// const TO_PATTERN = "DD/MM/YYYY HH:mm";
// const FROM_PATTERN_SHORT = "YYYY-MM-DD";
// const TO_PATTERN_SHORT = "DD/MM/YYYY";

// $(document).ajaxStart(function () {
//     loaderON();
// });

// $(document).ajaxStop(function () {
//     loaderOut();
// });

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {

    nombre = document.getElementById('name');
    usuario = document.getElementById('username');
    idDepartamento = document.getElementById('idDepartamento');
    idPuesto = document.getElementById('idPuesto');
    idPerfil = document.getElementById('idPerfil');
    email = document.getElementById('email');
    password = document.getElementById('password');
    confirmar_password = document.getElementById('password-confirm');

    nombre_departamento = document.getElementById('nombre_departamento');
    btnCrearDepartamento = document.getElementById('btnCrearDepartamento');
    id_Departamento = document.getElementById('id_Departamento');

    nombre_puesto = document.getElementById('nombre_puesto');
    btnCrearPuesto = document.getElementById('btnCrearPuesto');
    id_Puesto = document.getElementById('id_Puesto');

    nombre_perfil = document.getElementById('nombre_perfil');
    btnCrearPerfil = document.getElementById('btnCrearPerfil');
    id_Perfil = document.getElementById('id_Perfil');

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 170).toString() + "px";

    tblUsuarios = $('#tblUsuarios').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        // rowId: "Id_Ticket",
        select: true,
        scrollY: false,
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiUsuarios",
            type: "GET",
            dataType: "json",
            // data: {
            //     texto: texto,
            //     abiertos: abiertos,
            // },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top"f>rt<"bottom"lp><"clear">',
        columnDefs: [
            {
                // targets: [3],
                // render: $.fn.dataTable.render.moment(FROM_PATTERN, TO_PATTERN),
            },
            {
                targets: [4, 5, 6],
                orderable: false,
            }
        ],
        columns: [
            {
                data: 'id', // 0
                title: "N°",
                className: 'ps-2',
            },
            {
                data: 'name', // 1
                title: "Nombre",
            },
            {
                data: 'email', // 2
                // render: function (data, type, row) {
                //     return ('<a class="cursor-pointer text-primary" onclick="openTicket(' + row.Id_Ticket + ', ' + row.inputPrivilegios + ')">' + data + '</a>');
                // },
                title: "Email",
            },
            {
                data: 'created_at', // 3
                render: function (data, type, row) {
                    return moment(data).format(TO_PATTERN)
                },
                title: 'Fecha Creación'
            },
            {
                data: 'id', // 4
                render: function (data, type, row) {
                    if (row.AccesoUsuarios == 1 && row.EditarUsuarios == 1) {
                        return '<button data-bs-toggle="tooltip" title="Asignar Permisos" onclick="modalPermisos(' + data + ')" class="btn btn-warning btn-flat ms-2 rounded-btn btn-sm"><i class="fas fa-list-alt"></i></button>';
                    } else {
                        return '<i class="fas fa-ban fa-2x text-danger ms-2"></i>';
                    }
                },
                title: "Permisos",
            },
            {
                data: 'id', // 5
                render: function (data, type, row) {
                    if (row.AccesoUsuarios == 1 && row.EditarUsuarios == 1) {
                        return '<button data-bs-toggle="tooltip" title="Editar Usuario" class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarUsuario(' + data + ')"><i class="fas fa-pencil-alt"></i></button>';
                    } else {
                        return '<i class="fas fa-ban fa-2x text-danger ms-2"></i>';
                    }
                },
                title: "Editar",
            },
            {
                data: 'id', // 6
                render: function (data, type, row) {
                    if (row.AccesoUsuarios == 1 && row.EliminarUsuarios == 1) {
                        return '<button data-bs-toggle="tooltip" title="Eliminar Usuario" class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm" onclick=""><i class="fas fa-trash-alt"></i></button>';
                    } else {
                        return '<i class="fas fa-ban fa-2x text-danger ms-2"></i>';
                    }
                },
                title: "Eliminar",
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            $('[data-bs-toggle="tooltip"]').tooltip({
                trigger: 'hover',
            });
            ajustarTablas('tblUsuarios', heightTable);
            loaderOut();
        },
    });

    tblDepartamentos = $('#tblDepartamentos').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        select: true,
        scrollY: false,
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiDepartamentos",
            type: "GET",
            dataType: "json",
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top"f>rt<"bottom"lp><"clear">',
        columnDefs: [
            {
                targets: [2, 3, 4],
                orderable: false,
            }
        ],
        columns: [
            {
                data: 'id', // 0
                title: "N°",
                className: 'ps-2',
            },
            {
                data: 'nombre', // 1
                title: "Nombre",
                className: 'w-50'
            },
            {
                data: 'estatus', // 2
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch"' + $checked + ' id="dep_estatus_' + row.id + '"><label class="form-check-label" for="dep_estatus_' + row.id + '"></label></div>'
                },
                title: "Activo",
                width: '20px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'id', // 3
                render: function (data, type, row) {
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarDepartamento(' + data + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: "Editar",
                width: '20px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'id', // 4
                render: function (data, type, row) {
                    return '<button class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm" onclick=""><i class="fas fa-trash-alt"></i></button>';
                },
                title: "Eliminar",
                width: '20px',
                className: 'dt-body-center text-center'
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblDepartamentos', heightTable);
            loaderOut();
        },
    });

    tblPuestos = $('#tblPuestos').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        select: true,
        scrollY: false,
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiPuestos",
            type: "GET",
            dataType: "json",
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top"f>rt<"bottom"lp><"clear">',
        columnDefs: [
            {
                targets: [2, 3, 4],
                orderable: false,
            }
        ],
        columns: [
            {
                data: 'id', // 0
                title: "N°",
                className: 'ps-2',
            },
            {
                data: 'nombre', // 1
                title: "Nombre",
                className: 'w-50'
            },
            {
                data: 'estatus', // 2
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch"' + $checked + ' id="dep_estatus_' + row.id + '"><label class="form-check-label" for="dep_estatus_' + row.id + '"></label></div>'
                },
                title: "Activo",
                width: '20px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'id', // 3
                render: function (data, type, row) {
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarPuesto(' + data + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: "Editar",
                width: '20px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'id', // 4
                render: function (data, type, row) {
                    return '<button class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm" onclick=""><i class="fas fa-trash-alt"></i></button>';
                },
                title: "Eliminar",
                width: '20px',
                className: 'dt-body-center text-center'
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblPuestos', heightTable);
            loaderOut();
        },
    });

    tblPerfiles = $('#tblPerfiles').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        select: true,
        scrollY: false,
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiPerfiles",
            type: "GET",
            dataType: "json",
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top"f>rt<"bottom"lp><"clear">',
        columnDefs: [
            {
                targets: [2, 3, 4],
                orderable: false,
            }
        ],
        columns: [
            {
                data: 'id', // 0
                title: "N°",
                className: 'ps-2',
            },
            {
                data: 'nombre', // 1
                title: "Nombre",
                className: 'w-50'
            },
            {
                data: 'estatus', // 2
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch"' + $checked + ' id="dep_estatus_' + row.id + '"><label class="form-check-label" for="dep_estatus_' + row.id + '"></label></div>'
                },
                title: "Activo",
                width: '20px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'id', // 3
                render: function (data, type, row) {
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarPerfil(' + data + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: "Editar",
                width: '20px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'id', // 4
                render: function (data, type, row) {
                    return '<button class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm" onclick=""><i class="fas fa-trash-alt"></i></button>';
                },
                title: "Eliminar",
                width: '20px',
                className: 'dt-body-center text-center'
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblPerfiles', heightTable);
            loaderOut();
        },
    });

});

$('#mod_Register').on('shown.bs.modal', function () {
    nombre.focus();
    validarUsuario();
})

$('#mod_Departamentos').on('shown.bs.modal', function () {
    nombre_departamento.focus();
    validarDepartamento();
})

$('#mod_Puestos').on('shown.bs.modal', function () {
    nombre_puesto.focus();
    validarPuesto();
})

$('#mod_Perfiles').on('shown.bs.modal', function () {
    nombre_perfil.focus();
    validarPerfil();
})

function nuevoUsuario() {
    $('#mod_Register').modal('show');
    limpiarUsuario();
    editar_usuario = 0;
}

function nuevoDepartamento() {
    $('#mod_Departamentos').modal('show');
    limpiarDepartamento();
    editar_dep = 0;
}

function nuevoPuesto() {
    $('#mod_Puestos').modal('show');
    limpiarPuesto();
    editar_puesto = 0;
}

function nuevoPerfil() {
    $('#mod_Perfiles').modal('show');
    limpiarPerfil();
    editar_perfil = 0;
}

function closeMRegister() {
    $('#mod_Register').modal('hide');
}

function closeMDepartamento() {
    $('#mod_Departamentos').modal('hide');
}

function closeMPuesto() {
    $('#mod_Puestos').modal('hide');
}

function closeMPerfil() {
    $('#mod_Perfiles').modal('hide');
}

$('#nombre_departamento').change(function () {
    validarDepartamento();
})

$('#nombre_puesto').change(function () {
    validarPuesto();
})

$('#nombre_perfil').change(function () {
    validarPerfil();
})

$('#name').change(function () {
    validarUsuario();
})

$('#username').change(function () {
    validarUsuario();
})

$('#email').change(function () {
    $.ajax({
        url: serve + 'obtenerEmail',
        type: 'GET',
        dataType: 'JSON',
        data: {
            email: $('#email').val(),
        },
        success: function (data) {
            console.log(data);
            if (data.email.toLowerCase() == $('#email').val().toLowerCase()) {
                Swal.fire('El Email ya existe, capturar otro.');
                $('#email').focus();
                $('#email').val('');
                validarUsuario()
            }
        }
    })
    validarUsuario();
})

$('#password').change(function () {
    validarUsuario();
})

$('#password-confirm').change(function () {
    validarUsuario();
})

selectRowClientes('tblUsuarios');
selectRowClientes('tblDepartamentos');
selectRowClientes('tblPuestos');
selectRowClientes('tblPerfiles');

function validarUsuario() {
    if (editar_usuario == 1) {
        if (nombre.value == null || nombre.value == '' || usuario.value == null || usuario.value == '' || email.value == null || email.value == '') {
            btnCrearUsuario.disabled = true;
        } else {
            btnCrearUsuario.disabled = false;
        }
    } else {
        if (nombre.value == null || nombre.value == '' || usuario.value == null || usuario.value == '' || email.value == null || email.value == '' || password.value == null || password.value == '' || confirmar_password.value == null || confirmar_password.value == '') {
            btnCrearUsuario.disabled = true;
        } else {
            if (password.value == confirmar_password.value) {
                btnCrearUsuario.disabled = false;
            } else {
                Swal.fire('Password no coincide.');
                password.value = null;
                confirmar_password.value = null;
                password.focus();
                btnCrearUsuario.disabled = true;
            }
        }
    }

    if (nombre.value == null || nombre.value == '') {
        nombre.style.borderColor = 'red';
    } else {
        nombre.style.borderColor = 'green';
    }

    if (usuario.value == null || usuario.value == '') {
        usuario.style.borderColor = 'red';
    } else {
        usuario.style.borderColor = 'green';
    }

    if (email.value == null || email.value == '') {
        email.style.borderColor = 'red';
    } else {
        email.style.borderColor = 'green';
    }

    if (password.value == null || password.value == '') {
        password.style.borderColor = 'red';
    } else {
        password.style.borderColor = 'green';
    }

    if (confirmar_password.value == null || confirmar_password.value == '') {
        confirmar_password.style.borderColor = 'red';
    } else {
        confirmar_password.style.borderColor = 'green';
    }

}

function validarDepartamento() {
    if (nombre_departamento.value == null || nombre_departamento.value == '') {
        btnCrearDepartamento.disabled = true;
    } else {
        btnCrearDepartamento.disabled = false;
    }

    if (nombre_departamento.value == null || nombre_departamento.value == '') {
        nombre_departamento.style.borderColor = 'red';
    } else {
        nombre_departamento.style.borderColor = 'green';
    }
}

function validarPuesto() {
    if (nombre_puesto.value == null || nombre_puesto.value == '') {
        btnCrearPuesto.disabled = true;
    } else {
        btnCrearPuesto.disabled = false;
    }

    if (nombre_puesto.value == null || nombre_puesto.value == '') {
        nombre_puesto.style.borderColor = 'red';
    } else {
        nombre_puesto.style.borderColor = 'green';
    }
}

function validarPerfil() {
    if (nombre_perfil.value == null || nombre_perfil.value == '') {
        btnCrearPerfil.disabled = true;
    } else {
        btnCrearPerfil.disabled = false;
    }

    if (nombre_perfil.value == null || nombre_perfil.value == '') {
        nombre_perfil.style.borderColor = 'red';
    } else {
        nombre_perfil.style.borderColor = 'green';
    }
}

function crearUsuario() {
    if (editar_usuario == 0) {
        $.ajax({
            url: serve + 'crearUsuario',
            type: 'GET',
            dataType: 'JSON',
            data: {
                nombre: nombre.value,
                usuario: usuario.value,
                idDepartamento: idDepartamento.value,
                idPuesto: idPuesto.value,
                idPerfil: idPerfil.value,
                email: email.value,
                password: password.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Usuario Creado',
                });
                $('#mod_Register').modal('hide');
                limpiarUsuario();
                tblUsuarios.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })
    } else {
        $.ajax({
            url: serve + 'actualizarUsuario',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id_Usuario.value,
                nombre: nombre.value,
                usuario: usuario.value,
                idDepartamento: idDepartamento.value,
                idPuesto: idPuesto.value,
                idPerfil: idPerfil.value,
                email: email.value,
                // password: password.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Usuario Actualizado',
                });
                $('#mod_Register').modal('hide');
                limpiarUsuario();
                tblUsuarios.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })
    }
}

function crearDepartamento() {
    if (editar_dep == 0) {
        $.ajax({
            url: serve + 'crearDepartamento',
            type: 'GET',
            dataType: 'JSON',
            data: {
                nombre: nombre_departamento.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Departamento Creado',
                });
                $('#mod_Departamentos').modal('hide');
                limpiarDepartamento();
                tblDepartamentos.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })
    } else {
        $.ajax({
            url: serve + 'actualizarDepartamento',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id_Departamento.value,
                nombre: nombre_departamento.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Departamento Actualizado',
                });
                $('#mod_Departamentos').modal('hide');
                limpiarDepartamento();
                tblDepartamentos.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })

    }
}

function crearPuesto() {
    if (editar_puesto == 0) {
        $.ajax({
            url: serve + 'crearPuesto',
            type: 'GET',
            dataType: 'JSON',
            data: {
                nombre: nombre_puesto.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Puesto Creado',
                });
                $('#mod_Puestos').modal('hide');
                limpiarPuesto();
                tblPuestos.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })
    } else {
        $.ajax({
            url: serve + 'actualizarPuesto',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id_Puesto.value,
                nombre: nombre_puesto.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Puesto Actualizado',
                });
                $('#mod_Puestos').modal('hide');
                limpiarPuesto();
                tblPuestos.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })

    }
}

function crearPerfil() {
    if (editar_perfil == 0) {
        $.ajax({
            url: serve + 'crearPerfil',
            type: 'GET',
            dataType: 'JSON',
            data: {
                nombre: nombre_perfil.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Perfil Creado',
                });
                $('#mod_Perfiles').modal('hide');
                limpiarPerfil();
                tblPerfiles.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })
    } else {
        $.ajax({
            url: serve + 'actualizarPerfil',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id_Perfil.value,
                nombre: nombre_perfil.value,
            },
            success: function (data) {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Perfil Actualizado',
                });
                $('#mod_Perfiles').modal('hide');
                limpiarPerfil();
                tblPerfiles.ajax.reload();
            },
            error: function () {
                const Msg = Swal.mixin({
                    toast: true,
                    position: "center",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Msg.fire({
                    title: 'Error en servidor...',
                });
            },
        })

    }
}

function editarUsuario(id) {
    editar_usuario = 1;
    $.ajax({
        url: serve + 'obtenerUsuario',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
        },
        success: function (data) {
            $('#mod_Register').modal('show');
            id_Usuario.value = data.id;
            nombre.value = data.name;
            usuario.value = data.username;
            idDepartamento.value = data.idDepartamento;
            idPuesto.value = data.idPuesto;
            idPerfil.value = data.idPerfil;
            email.value = data.email;
            password.value = data.password;
            divPassword.style.display = 'none';
            password.style.display = 'none';
            confirmar_password.style.display = 'none';
            $('#titleRegister').text('Editar Usuario');
            $('#btnCrearUsuario').text('Actualizar');
        },
        error: function () {
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: 'Error en servidor...',
            });
        },
    })
}

function editarDepartamento(id) {
    editar_dep = 1;
    $.ajax({
        url: serve + 'obtenerDepartamento',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
        },
        success: function (data) {
            console.log(data);
            $('#mod_Departamentos').modal('show');
            id_Departamento.value = data.id;
            nombre_departamento.value = data.nombre;
        },
        error: function () {
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: 'Error en servidor...',
            });
        },
    })
}

function editarPuesto(id) {
    editar_puesto = 1;
    $.ajax({
        url: serve + 'obtenerPuesto',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
        },
        success: function (data) {
            $('#mod_Puestos').modal('show');
            id_Puesto.value = data.id;
            nombre_puesto.value = data.nombre;
        },
        error: function () {
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: 'Error en servidor...',
            });
        },
    })
}

function editarPerfil(id) {
    editar_perfil = 1;
    $.ajax({
        url: serve + 'obtenerPerfil',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
        },
        success: function (data) {
            $('#mod_Perfiles').modal('show');
            id_Perfil.value = data.id;
            nombre_perfil.value = data.nombre;
        },
        error: function () {
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: 'Error en servidor...',
            });
        },
    })
}

function limpiarUsuario() {
    nombre.value = null;
    usuario.value = null;
    idDepartamento.value = '';
    idPuesto.value = '';
    idPerfil.value = '';
    email.value = null;
    password.value = null;
    confirmar_password.value = null;
}

function limpiarDepartamento() {
    nombre_departamento.value = null;
}

function limpiarPuesto() {
    nombre_puesto.value = null;
}

function limpiarPerfil() {
    nombre_perfil.value = null;
}

function modalPermisos(id) {
    $('#mod_Permisos').modal('show');
    tblPermisos = $('#tblPermisos').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: true,
        serverSide: true,
        rowId: "id",
        select: true,
        // scrollY: false,
        scrollX: false,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: true,
        // order: [
        //     [0, "DESC"],
        // ],
        ajax: {
            url: serve + "apiModulosPermisos",
            type: "GET",
            dataType: "json",
            data: {
                id: id,
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top"><"bottom"><"clear">',
        columnDefs: [
            {
                targets: [0, 1, 2, 3, 4],
                orderable: false,
            }
        ],
        columns: [
            {
                data: 'modulo', // 0
                title: "Módulo",
                className: 'ps-2',
            },
            {
                data: 'acceso', // 1
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input cursor-pointer" onclick="permisoAcceso(' + row.id + ', ' + data + ')" type="checkbox" role="switch"' + $checked + ' id="acceso_' + row.id + '"><label class="form-check-label" for="flexSwitchCheckDefault"></label></div>'
                },
                title: "Acceso",
                className: 'text-center dt-body-center',
            },
            {
                data: 'crear', // 2
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input cursor-pointer" onclick="permisoCrear(' + row.id + ', ' + data + ')" type="checkbox" role="switch"' + $checked + ' id="crear_' + row.id + '"><label class="form-check-label" for="flexSwitchCheckDefault"></label></div>'
                },
                title: "Crear",
                className: 'text-center dt-body-center',
            },
            {
                data: 'editar', // 3
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input cursor-pointer" onclick="permisoEditar(' + row.id + ', ' + data + ')" type="checkbox" role="switch"' + $checked + ' id="editar_' + row.id + '"><label class="form-check-label" for="flexSwitchCheckDefault"></label></div>'
                },
                title: "Editar",
                className: 'text-center dt-body-center',
            },
            {
                data: 'eliminar', // 4
                render: function (data, type, row) {
                    if (data == 0) {
                        $checked = '';
                    } else {
                        $checked = 'checked';
                    }
                    return '<div class="form-check form-switch"><input class="form-check-input cursor-pointer" onclick="permisoEliminar(' + row.id + ', ' + data + ')" type="checkbox" role="switch"' + $checked + ' id="eliminar_' + row.id + '"><label class="form-check-label" for="flexSwitchCheckDefault"></label></div>'
                },
                title: "Eliminar",
                className: 'text-center dt-body-center',
            },
            // {
            //     data: 'created_at', // 3
            //     render: function (data, type, row) {
            //         return moment(data).format(TO_PATTERN)
            //     },
            //     title: 'Fecha Creación'
            // },
            // {
            //     data: 'id', // 4
            //     render: function (data, type, row) {
            //         return '<button class="btn btn-warning btn-flat ms-2 rounded-btn btn-sm" onclick="modalPermisos(' + data + ')"><i class="fas fa-list-alt"></i></button>';
            //     },
            //     title: "Permisos",
            // },
            // {
            //     data: 'id', // 5
            //     render: function (data, type, row) {
            //         return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick=""><i class="fas fa-pencil-alt"></i></button>';
            //     },
            //     title: "Editar",
            // },
            // {
            //     data: 'id', // 6
            //     render: function (data, type, row) {
            //         return '<button class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm" onclick=""><i class="fas fa-trash-alt"></i></button>';
            //     },
            //     title: "Eliminar",
            // },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            // ajustarTablas('tblUsuarios', heightTable);
            loaderOut();
        },
    });
}

function permisoAcceso(id, checked) {
    if (checked == 0) {
        check = 1;
    } else {
        check = 0;
    }

    $.ajax({
        url: serve + 'permisoAcceso',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
            check: check,
        },
    })
}

function permisoCrear(id, checked) {
    if (checked == 0) {
        check = 1;
    } else {
        check = 0;
    }

    $.ajax({
        url: serve + 'permisoCrear',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
            check: check,
        },
    })
}

function permisoEditar(id, checked) {
    if (checked == 0) {
        check = 1;
    } else {
        check = 0;
    }

    $.ajax({
        url: serve + 'permisoEditar',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
            check: check,
        },
    })
}

function permisoEliminar(id, checked) {
    if (checked == 0) {
        check = 1;
    } else {
        check = 0;
    }

    $.ajax({
        url: serve + 'permisoEliminar',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
            check: check,
        },
    })
}

function guardarPermisos() {
    $('#mod_Permisos').modal('hide');
}

function mostrarUsuarios() {
    $("#usuarios").addClass("active");
    $("#usuarios").addClass("show");

    $("#usuarios-tab").addClass("active");
    $("#usuarios-tab").addClass("show");

    $("#departamentos").removeClass("active");
    $("#departamentos").removeClass("show");

    $("#departamentos-tab").removeClass("active");
    $("#departamentos-tab").removeClass("show");

    $("#puestos").removeClass("active");
    $("#puestos").removeClass("show");

    $("#puestos-tab").removeClass("active");
    $("#puestos-tab").removeClass("show");

    $("#perfiles").removeClass("active");
    $("#perfiles").removeClass("show");

    $("#perfiles-tab").removeClass("active");
    $("#perfiles-tab").removeClass("show");

    document.getElementById("usuarios").style.display = "block";
    document.getElementById("departamentos").style.display = "none";
    document.getElementById("puestos").style.display = "none";
    document.getElementById("perfiles").style.display = "none";

    tblUsuarios.draw(false);
}

function mostrarDepartamentos() {
    $("#usuarios").removeClass("active");
    $("#usuarios").removeClass("show");

    $("#usuarios-tab").removeClass("active");
    $("#usuarios-tab").removeClass("show");

    $("#departamentos").addClass("active");
    $("#departamentos").addClass("show");

    $("#departamentos-tab").addClass("active");
    $("#departamentos-tab").addClass("show");

    $("#puestos").removeClass("active");
    $("#puestos").removeClass("show");

    $("#puestos-tab").removeClass("active");
    $("#puestos-tab").removeClass("show");

    $("#perfiles").removeClass("active");
    $("#perfiles").removeClass("show");

    $("#perfiles-tab").removeClass("active");
    $("#perfiles-tab").removeClass("show");

    document.getElementById("usuarios").style.display = "none";
    document.getElementById("departamentos").style.display = "block";
    document.getElementById("puestos").style.display = "none";
    document.getElementById("perfiles").style.display = "none";

    tblDepartamentos.draw(false);
}

function mostrarPuestos() {
    $("#usuarios").removeClass("active");
    $("#usuarios").removeClass("show");

    $("#usuarios-tab").removeClass("active");
    $("#usuarios-tab").removeClass("show");

    $("#departamentos").removeClass("active");
    $("#departamentos").removeClass("show");

    $("#departamentos-tab").removeClass("active");
    $("#departamentos-tab").removeClass("show");

    $("#puestos").addClass("active");
    $("#puestos").addClass("show");

    $("#puestos-tab").addClass("active");
    $("#puestos-tab").addClass("show");

    $("#perfiles").removeClass("active");
    $("#perfiles").removeClass("show");

    $("#perfiles-tab").removeClass("active");
    $("#perfiles-tab").removeClass("show");

    document.getElementById("usuarios").style.display = "none";
    document.getElementById("departamentos").style.display = "none";
    document.getElementById("puestos").style.display = "block";
    document.getElementById("perfiles").style.display = "none";

    tblPuestos.draw(false);
}

function mostrarPerfiles() {
    $("#usuarios").removeClass("active");
    $("#usuarios").removeClass("show");

    $("#usuarios-tab").removeClass("active");
    $("#usuarios-tab").removeClass("show");

    $("#departamentos").removeClass("active");
    $("#departamentos").removeClass("show");

    $("#departamentos-tab").removeClass("active");
    $("#departamentos-tab").removeClass("show");

    $("#puestos").removeClass("active");
    $("#puestos").removeClass("show");

    $("#puestos-tab").removeClass("active");
    $("#puestos-tab").removeClass("show");

    $("#perfiles").addClass("active");
    $("#perfiles").addClass("show");

    $("#perfiles-tab").addClass("active");
    $("#perfiles-tab").addClass("show");

    document.getElementById("usuarios").style.display = "none";
    document.getElementById("departamentos").style.display = "none";
    document.getElementById("puestos").style.display = "none";
    document.getElementById("perfiles").style.display = "block";

    tblPerfiles.draw(false);
}
