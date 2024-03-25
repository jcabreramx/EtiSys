serve = base_path;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

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

    Agente = document.getElementById('Agente');
    NombreAgente = document.getElementById('NombreAgente');
    Consecutivo = document.getElementById('Consecutivo');
    Comision = document.getElementById('Comision');

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 205).toString() + "px";

    cargarAgentes();
});


function cargarAgentes() {

    tblAgentes = $('#tblAgentes').DataTable({
        destroy: true,
        pageResize: false,
        searchable: true,
        processing: false,
        serverSide: true,
        select: true,
        scrollY: false,
        scrollX: true,
        scrollCollapse: true,
        paginate: true,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiAgentes",
            type: "GET",
            dataType: "json",
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top"f>rt<"bottom"lp><"clear">',
        columnDefs: [
            {
                targets: [4],
                orderable: false,
            }
        ],
        columns: [
            {
                data: 'Agente', // 0
                title: "Clave",
                width: '50px',
                className: 'ps-2',
            },
            {
                data: 'NombreAgente', // 1
                title: "Nombre",
                className: 'w-50'
            },
            {
                data: 'Consecutivo', // 2
                title: "Consecutivo",
                width: '50px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'Comision', // 3
                title: "Comision",
                width: '50px',
                className: 'dt-body-center text-center'
            },
            {
                data: 'Agente', // 4
                render: function (data, type, row) {
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarAgente(' + "'" + data + "'" + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: "Editar",
                width: '50px',
                className: 'dt-body-center text-center'
            },
        ],
        pageLength: 50,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblAgentes', heightTable);
            loaderOut();
        },
    });
}

selectRow('tblAgentes');

function nuevoAgente() {
    $('#AddOrEditAgente').modal('show');
    $('#Agente').val('');
    $('#NombreAgente').val('');
    $('#Consecutivo').val('');
    $('#Comision').val('');
    $('#titleAgente').text('Nuevo Agente');
    Agente.focus();
    validarAgente();
}

$('#AddOrEditAgente').on('shown.bs.modal', function () {
    Agente.focus();
})

function editarAgente(agente) {
    $.ajax({
        url: serve + 'obtenerAgente',
        type: 'GET',
        dataType: 'JSON',
        data: {
            Agente: agente,
        },
        success: function (data, type, row) {
            $('#AddOrEditAgente').modal('show');
            $('#ClaveAgente').val(data[0].Agente);
            $('#Agente').val(data[0].Agente);
            // $('#Agente').prop('disabled', true);
            $('#NombreAgente').val(data[0].NombreAgente);
            $('#Consecutivo').val(data[0].Consecutivo);
            $('#Comision').val(data[0].Comision);
            $('#titleAgente').text('Editar Agente');
            Agente.focus();
            validarAgente();
        },
        error: function(){
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
        }
    });
}

function closeMAgente() {
    $('#AddOrEditAgente').modal('hide');
}

$('#Agente').change(function(){
    validarAgente();
})

$('#NombreAgente').change(function(){
    validarAgente();
})

$('#Consecutivo').change(function(){
    validarAgente();
})

$('#Comision').change(function(){
    validarAgente();
})

function crearAgente() {
    ClaveAgente = document.getElementById('ClaveAgente');
    if (ClaveAgente.value == '' || ClaveAgente.value == null) {
        url = serve + 'insertarAgente';
        mensaje = 'Agente Creado';
    } else {
        url = serve + 'actualizarAgente';
        mensaje = 'Agente Actualizado';
    }
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'JSON',
        data: $("#AddOrEditAgente form").serialize(),
        success: function(data) {
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: mensaje,
            });
            $("#AddOrEditAgente").modal('hide');
            tblAgentes.draw(false);
        },
        error: function(){
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
        }
        // data: $("#AddOrEditAgente form").serialize() + '&FechaRegistro=' + dateFormat(dateToday, 'dd/mm/yyyy H:MM:ss'),
    })
}

function validarAgente(){
    if ($('#Agente').val() == '' || $('#NombreAgente').val() == '' || $('#Consecutivo').val() == '' || $('#Comision').val() == '') {
        $('#btnCrearAgente').prop('disabled', true);
    } else {
        $('#btnCrearAgente').prop('disabled', false);
    }

    if ($('#Agente').val() == '') {
        Agente.style.borderColor = 'red';
    } else {
        Agente.style.borderColor = 'green';
    }

    if ($('#NombreAgente').val() == '') {
        NombreAgente.style.borderColor = 'red';
    } else {
        NombreAgente.style.borderColor = 'green';
    }

    if ($('#Consecutivo').val() == '') {
        Consecutivo.style.borderColor = 'red';
    } else {
        Consecutivo.style.borderColor = 'green';
    }

    if ($('#Comision').val() == '') {
        Comision.style.borderColor = 'red';
    } else {
        Comision.style.borderColor = 'green';
    }

}

function mostrarAgentes() {
    $("#agentes").addClass("active");
    $("#agentes").addClass("show");
    $("#agentes-tab").addClass("active");
    $("#agentes-tab").addClass("show");
    document.getElementById("agentes").style.display = "block";

    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    tblAgentes.draw(false);

}

function mostrarProveedores() {
    $("#proveedores").addClass("active");
    $("#proveedores").addClass("show");
    $("#proveedores-tab").addClass("active");
    $("#proveedores-tab").addClass("show");
    document.getElementById("proveedores").style.display = "block";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarAlmacenes() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").addClass("active");
    $("#almacenes").addClass("show");
    $("#almacenes-tab").addClass("active");
    $("#almacenes-tab").addClass("show");
    document.getElementById("almacenes").style.display = "block";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarPresentaciones() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").addClass("active");
    $("#presentaciones").addClass("show");
    $("#presentaciones-tab").addClass("active");
    $("#presentaciones-tab").addClass("show");
    document.getElementById("presentaciones").style.display = "block";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarEstados() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").addClass("active");
    $("#estados").addClass("show");
    $("#estados-tab").addClass("active");
    $("#estados-tab").addClass("show");
    document.getElementById("estados").style.display = "block";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarPaises() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").addClass("active");
    $("#paises").addClass("show");
    $("#paises-tab").addClass("active");
    $("#paises-tab").addClass("show");
    document.getElementById("paises").style.display = "block";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarMensajeros() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").addClass("active");
    $("#mensajeros").addClass("show");
    $("#mensajeros-tab").addClass("active");
    $("#mensajeros-tab").addClass("show");
    document.getElementById("mensajeros").style.display = "block";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarActividadesMensajeria() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").addClass("active");
    $("#actividades_mensajeria").addClass("show");
    $("#actividades_mensajeria-tab").addClass("active");
    $("#actividades_mensajeria-tab").addClass("show");
    document.getElementById("actividades_mensajeria").style.display = "block";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarTiposCambio() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").addClass("active");
    $("#tipos_cambio").addClass("show");
    $("#tipos_cambio-tab").addClass("active");
    $("#tipos_cambio-tab").addClass("show");
    document.getElementById("tipos_cambio").style.display = "block";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarConceptosBonificaciones() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").addClass("active");
    $("#conceptos_bonificaciones").addClass("show");
    $("#conceptos_bonificaciones-tab").addClass("active");
    $("#conceptos_bonificaciones-tab").addClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "block";

    $("#conceptos_deducciones").removeClass("active");
    $("#conceptos_deducciones").removeClass("show");
    $("#conceptos_deducciones-tab").removeClass("active");
    $("#conceptos_deducciones-tab").removeClass("show");
    document.getElementById("conceptos_deducciones").style.display = "none";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarConceptosDeducciones() {
    $("#proveedores").removeClass("active");
    $("#proveedores").removeClass("show");
    $("#proveedores-tab").removeClass("active");
    $("#proveedores-tab").removeClass("show");
    document.getElementById("proveedores").style.display = "none";

    $("#agentes").removeClass("active");
    $("#agentes").removeClass("show");
    $("#agentes-tab").removeClass("active");
    $("#agentes-tab").removeClass("show");
    document.getElementById("agentes").style.display = "none";

    $("#almacenes").removeClass("active");
    $("#almacenes").removeClass("show");
    $("#almacenes-tab").removeClass("active");
    $("#almacenes-tab").removeClass("show");
    document.getElementById("almacenes").style.display = "none";

    $("#presentaciones").removeClass("active");
    $("#presentaciones").removeClass("show");
    $("#presentaciones-tab").removeClass("active");
    $("#presentaciones-tab").removeClass("show");
    document.getElementById("presentaciones").style.display = "none";

    $("#estados").removeClass("active");
    $("#estados").removeClass("show");
    $("#estados-tab").removeClass("active");
    $("#estados-tab").removeClass("show");
    document.getElementById("estados").style.display = "none";

    $("#paises").removeClass("active");
    $("#paises").removeClass("show");
    $("#paises-tab").removeClass("active");
    $("#paises-tab").removeClass("show");
    document.getElementById("paises").style.display = "none";

    $("#mensajeros").removeClass("active");
    $("#mensajeros").removeClass("show");
    $("#mensajeros-tab").removeClass("active");
    $("#mensajeros-tab").removeClass("show");
    document.getElementById("mensajeros").style.display = "none";

    $("#actividades_mensajeria").removeClass("active");
    $("#actividades_mensajeria").removeClass("show");
    $("#actividades_mensajeria-tab").removeClass("active");
    $("#actividades_mensajeria-tab").removeClass("show");
    document.getElementById("actividades_mensajeria").style.display = "none";

    $("#tipos_cambio").removeClass("active");
    $("#tipos_cambio").removeClass("show");
    $("#tipos_cambio-tab").removeClass("active");
    $("#tipos_cambio-tab").removeClass("show");
    document.getElementById("tipos_cambio").style.display = "none";

    $("#conceptos_bonificaciones").removeClass("active");
    $("#conceptos_bonificaciones").removeClass("show");
    $("#conceptos_bonificaciones-tab").removeClass("active");
    $("#conceptos_bonificaciones-tab").removeClass("show");
    document.getElementById("conceptos_bonificaciones").style.display = "none";

    $("#conceptos_deducciones").addClass("active");
    $("#conceptos_deducciones").addClass("show");
    $("#conceptos_deducciones-tab").addClass("active");
    $("#conceptos_deducciones-tab").addClass("show");
    document.getElementById("conceptos_deducciones").style.display = "block";

    // var tableCAll = $('#tblContactosAll').DataTable();
    // cargarContactosAll();

    // tableCAll.draw(false);

}
