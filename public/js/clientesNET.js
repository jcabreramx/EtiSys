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
    iniciar();


    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 355).toString() + "px";
    heightTableCon = (homeHeigth.clientHeight - cardGeneral.clientHeight + 60).toString() + "px";
    heightTableConAll = (homeHeigth.clientHeight - 259).toString() + "px";


    cargarClientes();
    // cargarContactosAll();
    // loaderOut();
});

function iniciar() {

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 355).toString() + "px";
    heightTableCon = (homeHeigth.clientHeight - cardGeneral.clientHeight + 60).toString() + "px";
    heightTableConAll = (homeHeigth.clientHeight - 259).toString() + "px";

    // $('#tblClientes').DataTable({
    //     destroy: true,
    //     scrollY: false,
    //     scrollX: true,
    //     language: {
    //         url: serve + "js/spanish-DT.json",
    //     },
    //     dom: '<"top">rt<"bottom"i><"clear">',
    //     initComplete: function (settings, json) {
    //         ajustarTablas('tblClientes', heightTable);
    //         loaderOut();
    //     },
    //     infoCallback: function (settings, start, end, max, total, pre) {
    //         if (total == 0) return "<strong class='ml-2'>Aplicar Búsqueda</strong>";
    //     },
    // });

    $('#tblContactos').DataTable({
        destroy: true,
        scrollY: false,
        scrollX: true,
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"><"clear">',
        initComplete: function (settings, json) {
            ajustarTablas('tblContactos', heightTableCon);
            // loaderOut();
        },
    });

    $('#tblContactosTel').DataTable({
        destroy: true,
        scrollY: false,
        scrollX: true,
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"><"clear">',
        initComplete: function (settings, json) {
            ajustarTablas('tblContactosTel', heightTableCon);
            // loaderOut();
        },
    });

    // $('#tblContactosAll').DataTable({
    //     destroy: true,
    //     scrollY: false,
    //     scrollX: true,
    //     language: {
    //         url: serve + "js/spanish-DT.json",
    //     },
    //     dom: '<"top">rt<"bottom"i><"clear">',
    //     initComplete: function (settings, json) {
    //         ajustarTablas('tblContactosAll', heightTableConAll);
    //         loaderOut();
    //     },
    //     infoCallback: function (settings, start, end, max, total, pre) {
    //         if (total == 0) return "<strong class='ml-2'>Aplicar Búsqueda</strong>";
    //     },
    // });

}

function cargarClientes() {

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 305).toString() + "px";
    heightTableCon = (homeHeigth.clientHeight - cardGeneral.clientHeight - 10).toString() + "px";

    nombre = $('#searchNombre').val();
    nombreCorto = $('#searchNombreCorto').val();
    origen = $('#searchOrigen').val();
    tipo = $('#searchTipo').val();
    grupo = $('#searchGrupo').val();
    agente = $('#searchAgente').val();
    grupoIds = null;
    ultimaLetra = null;
    // ultimaLetra = nombre.slice(-1);
    // var table = $('#tblClientes').DataTable();
    // table.clear();
    ajustarTablas('tblClientes', heightTable);

    tblClientes = $('#tblClientes').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        select: false,
        scrollY: false,
        scrollX: true,
        scrollCollapse: false,
        paginate: true,
        stateSave: false,
        deferRender: true,
        order: [
            [0, "ASC"],
        ],
        ajax: {
            url: serve + "apiClientesNET",
            type: "GET",
            dataType: "json",
            data: {
                nombre: nombre,
                nombreCorto: nombreCorto,
                origen: origen,
                tipo: tipo,
                grupo: grupo,
                agente: agente,
                grupoIds: grupoIds,
                ultimaLetra: ultimaLetra,
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"i><"clear"p>',
        columnDefs: [
            {
                targets: [7, 8],
                orderable: false
            },
        ],
        columns: [
            {
                data: 'vchClave', // 0
                title: " Clave",
                className: 'ps-2',
            },
            {
                data: 'vchNombre', // 1
                // render: function (data, type, row) {
                //     return ('<a @popper(Editar Cliente) class="cursor-pointer text-primary" onclick="openCliente(' + row.vchClave + ')" style="text-decoration: none">' + data + '</a>');
                // },
                title: "Nombre",
            },
            {
                data: 'vchNombreCorto', // 2
                title: "Nombre Corto",
            },
            {
                data: 'vchTipoCliente', // 3
                title: "Tipo",
            },
            {
                data: 'vchDescripcionGrupo', // 4
                title: "Grupo",
            },
            {
                data: 'vchDescripcionOrigen', // 5
                title: "Origen",
            },
            {
                data: 'vchNombreAgente', // 6
                title: 'Agente'
            },
            {
                data: 'vchClave', // 7
                render: function (data, type, row) {
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarCliente(' + "'" + row.vchEmpresaID + "'" + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: ''
            },
            {
                data: 'vchClave', // 8
                render: function (data, type, row) {
                    return '<button class="btn btn-warning btn-flat ms-2 rounded-btn btn-sm" onclick="actividadesCliente(' + row.vchEmpresaID + ')"><i class="fas fa-calendar-days"></i></button>';
                },
                title: ''
            },
        ],
        pageLength: 100,
        lengthMenu: [
            [100, 150, 200],
            [100, 150, 200],
        ],
        initComplete: function (settings, json) {
            // this.api()
            // .columns()
            // .every(function () {
            //     let column = this;
            //     let title = column.header().textContent;

            //     // Create input element
            //     let input = document.createElement('input');
            //     input.placeholder = title;
            //     column.header().replaceChildren(input);

            //     // Event listener for user input
            //     input.addEventListener('keyup', () => {
            //         if (column.search() !== this.value) {
            //             column.search(input.value).draw();
            //         }
            //     });
            // });
            ajustarTablas('tblClientes', heightTable);
            // ajustarTablas('tblContactosAll', heightTableConAll);
            loaderOut();
        },
        infoCallback: function (settings, start, end, max, total, pre) {
            if (total == 0) return "<strong class='ml-2'>No se econtraron Clientes</strong>";
            if (total == 1) return '<strong class="ml-2">' + total + ' Cliente Encontrado</strong>';
            return '<strong class="ml-2">' + end + ' de ' + total + ' Clientes Encontrados</strong>';
        },
    });

}

$('#searchTipo').change(function(){
    loaderON();
    if ($(this).val() == 'CTE ACTIVO') {
        document.getElementById('searchTipo').style.fontWeight = 'bold';
    } else {
        document.getElementById('searchTipo').style.fontWeight = '';
    }
    cargarClientes();
})

$('#searchGrupo').change(function(){
    loaderON();
    cargarClientes();
})

$('#searchOrigen').change(function(){
    loaderON();
    cargarClientes();
})

$('#searchAgente').change(function(){
    loaderON();
    cargarClientes();
})

$("#searchNombre").keypress(function (e) {
    if (e.which == 13) {
        loaderON();
        cargarClientes();
    }
});

$("#searchNombreCorto").keypress(function (e) {
    if (e.which == 13) {
        loaderON();
        cargarClientes();
    }
});

function limpiarClientes() {
    ajustarTablas('tblClientes', heightTable);
    nombre = $('#searchNombre').val('');
    nombreCorto = $('#searchNombreCorto').val('');
    origen = $('#searchOrigen').val('');
    tipo = $('#searchTipo').val('CTE ACTIVO');
    grupo = $('#searchGrupo').val('');
    agente = $('#searchAgente').val('');
    var table = $('#tblClientes').DataTable();
    table.clear();
    var tableC = $('#tblContactos').DataTable();
    tableC.clear();
    var tableCT = $('#tblContactosTel').DataTable();
    tableCT.clear();

    cargarClientes();
}

function cargarContactos(id) {

    console.log(id);
    var tableC = $('#tblContactos').DataTable();
    tableC.clear();

    tblContactos = $('#tblContactos').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        // rowId: "Id_Ticket",
        select: false,
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
            url: serve + "apiContactos",
            type: "GET",
            dataType: "json",
            data: {
                empresaId: id,
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"lp><"clear">',
        columns: [
            {
                data: 'chContactoID', // 0
                title: "N°",
                visible: false,
            },
            {
                data: 'vchNombre', // 1
                render: function (data, type, row) {
                    return data + ' ' + row.vchApellidoPaterno + ' ' + row.vchApellidoMaterno
                },
                title: "Nombre",
                className: 'ps-2',
            },
            {
                data: 'vchEmail', // 2
                title: "E-mail",
            },
            {
                data: 'vchTitulo', // 3
                title: "Titulo",
            },
            {
                data: 'vchPuesto', // 4
                title: 'Puesto'
            },
            {
                data: 'chSexo', // 5
                title: 'Sexo'
            },
            {
                data: 'vchHorario', // 6
                title: 'Horario'
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblContactos', heightTableCon);
            // loaderOut();
        },
    });


}

function cargarContactosTel(empresaId, id) {

    var table = $('#tblContactosTel').DataTable();
    table.clear();

    tblContactosTel = $('#tblContactosTel').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        // rowId: "Id_Ticket",
        select: false,
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
            url: serve + "apiContactosTel",
            type: "GET",
            dataType: "json",
            data: {
                empresaId: empresaId,
                contactoId: id,
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"lp><"clear">',
        columns: [
            {
                data: 'vchTelefonoID', // 0
                title: "Teléfono",
                className: 'ps-2',
            },
            {
                data: 'vchTipoTelefonoID', // 1
                title: "Tipo",
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblContactosTel', heightTableCon);
            // loaderOut();
        },
    });

}

function cargarContactosAll() {

    var tableCAll = $('#tblContactosAll').DataTable();
    tableCAll.clear();

    nombre = $('#searchNombreContacto').val();
    nombreCorto = $('#searchNombreCortoContacto').val();
    origen = $('#searchOrigenContacto').val();
    tipo = $('#searchTipoContacto').val();
    grupo = $('#searchGrupoContacto').val();
    agente = $('#searchAgenteContacto').val();
    grupoIds = null;
    ultimaLetra = nombre.slice(-1);

    tblContactosAll = $('#tblContactosAll').DataTable({
        destroy: true,
        pageResize: true,
        searchable: false,
        processing: false,
        serverSide: true,
        // rowId: "Id_Ticket",
        select: false,
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
            url: serve + "apiContactosAll",
            type: "GET",
            dataType: "json",
            data: {
                empresaId: '',
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"i><"clear"p>',
        columnDefs: [
            {
                targets: [7],
                orderable: false
                // render: $.fn.dataTable.render.moment(FROM_PATTERN, TO_PATTERN),
            },
        ],
        columns: [
            {
                data: 'chContactoID', // 0
                title: "N°",
                visible: false,
            },
            {
                data: 'vchNombre', // 1
                render: function (data, type, row) {
                    return data + ' ' + row.vchApellidoPaterno + ' ' + row.vchApellidoMaterno
                },
                title: "Nombre",
                className: 'ps-2',
            },
            {
                data: 'vchEmail', // 2
                title: "E-mail",
            },
            {
                data: 'vchTitulo', // 3
                title: "Titulo",
            },
            {
                data: 'vchPuesto', // 4
                title: 'Puesto'
            },
            {
                data: 'chSexo', // 5
                title: 'Sexo'
            },
            {
                data: 'vchHorario', // 6
                title: 'Horario'
            },
            {
                data: 'chContactoID', // 7
                render: function (data, type, row) {
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarContacto(' + row.chContactoID + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: ''
            },
        ],
        pageLength: 100,
        lengthMenu: [
            [100, 150, 200],
            [100, 150, 200],
        ],
        initComplete: function (settings, json) {
            ajustarTablas('tblContactosAll', heightTableConAll);
            // loaderOut();
        },
        infoCallback: function (settings, start, end, max, total, pre) {
            if (total == 0) return "<strong class='ml-2'>No se econtraron Contactos</strong>";
            if (total == 1) return '<strong class="ml-2">' + total + ' Contacto Encontrado</strong>';
            return '<strong class="ml-2">' + end + ' de ' + total + ' Contactos Encontrados</strong>';
        },
    });


}

selectRowClientes('tblClientes');
selectRowContactos('tblContactos');
selectRowContactos('tblContactosEdit');
selectRowContactosTel('tblContactosTel');
selectRowContactosTel('tblContactosTelEdit');
selectRowContactos('tblContactosAll');

$("#tblClientes tbody").on("click", "td", function () {
    data = tblClientes.row($(this).parents("tr")).data();
    id = data.vchEmpresaID;
    cargarContactos(id);
    // cargarContactosEdit(id);
    cargarContactosTel(null, null);
});

$("#tblContactos tbody").on("click", "td", function () {
    data = tblContactos.row($(this).parents("tr")).data();
    empresaId = data.vchEmpresaID;
    id = data.chContactoID;
    cargarContactosTel(empresaId, id);
});

$("#tblContactosEdit tbody").on("click", "td", function () {
    data = tblContactosEdit.row($(this).parents("tr")).data();
    empresaId = data.vchEmpresaID;
    id = data.chContactoID;
    cargarContactosTelEdit(empresaId, id);
});

function nuevoCliente() {
    $('#titleCliente').text('Nuevo Cliente');
    $('#AddOrEditClienteNET').modal('show');
}

function guardarCliente() {
    // var dateToday = new Date();

    $.ajax({
        url: serve + 'guardarClienteNET',
        type: 'POST',
        dataType: "json",
        // data: $("#AddOrEditCliente form").serialize() + '&FechaRegistro=' + dateFormat(dateToday, 'dd/mm/yyyy H:MM:ss'),
        data: $("#AddOrEditClienteNET form").serialize(),
        success: function () {
            $("#AddOrEditClienteNET").modal("hide");
            loaderOut();
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: 'Cliente Creado',
            });
            tblClientes.draw(false);
        },
        error: function () {
            loaderOut();
            $("#AddOrEditClienteNET").modal("hide");
            const Msg = Swal.mixin({
                toast: true,
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
            });
            Msg.fire({
                title: 'Cliente Creado',
            });
            tblClientes.draw(false);
        },
    });
}

function editarCliente(id) {
    $.ajax({
        url: serve + 'getClienteNET',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id,
        },
        success: function (data) {
            $('#titleCliente').text('Editar Cliente');
            $('#vchClave').val(data[0].vchClave);

            $('#vchAgente').val(data[0].vchAgente);
            $('#vchNombre').val(data[0].vchNombre);
            $('#vchNombreCorto').val(data[0].vchNombreCorto);
            $('#vchCadena').val(data[0].vchCadena);
            $('#vchTipoCliente').val(data[0].vchTipoCliente);
            $('#vchSector').val(data[0].vchSector);

            $('#vchOrigen').val(data[0].vchOrigen);
            $('#chPersonaFiscal').val(data[0].chPersonaFiscal);
            $('#vchRFC').val(data[0].vchRFC);
            $('#vchCurp').val(data[0].vchCurp);
            $('#vchCalle').val(data[0].vchCalle);
            $('#vchNumeroExterior').val(data[0].vchNumeroExterior);
            $('#vchEntreCalles').val(data[0].vchEntreCalles);
            $('#vchNumeroInterior').val(data[0].vchNumeroInterior);
            $('#vchCP').val(data[0].vchCP);
            $('#vchColonia').val(data[0].vchColonia);
            $('#vchMunicipio').val(data[0].vchMunicipio);
            $('#vchCiudad').val(data[0].vchCiudad);
            $('#vchEstado').val(data[0].vchEstado);
            $('#chGrupo').val(data[0].chGrupo);
            $('#vchWeb').val(data[0].vchWeb);
            $('#vchFormaPago').val(data[0].vchFormaPago);
            $('#vchCuenta').val(data[0].vchCuenta);
            $('#vchMailFE').val(data[0].vchMailFE);
            $('#vchUsuarioAlta').val(data[0].vchUsuarioAlta);
            $('#datFechaAlta').val(data[0].datFechaAlta);
            $('#vchUsuarioCambio').val(data[0].vchUsuarioCambio);
            $('#sdatFechaCambio').val(data[0].sdatFechaCambio);
            $('#vchUltimoResultado').val(data[0].vchUltimoResultado);
            $('#vchCondicionesPago').val(data[0].vchCondicionesPago);
            $('#vchProducto').val(data[0].vchProducto);
            $('#vchCampoLibre1').val(data[0].vchCampoLibre1);
            $('#vchCampoLibre2').val(data[0].vchCampoLibre2);
            $('#vchClave').prop('readonly', 'readonly');

            $('#txtNotas').val(data[0].txtNotas);

            $('#vchClaveCon').val(data[0].vchClave);
            $('#vchNombreCon').val(data[0].vchNombre);

            cargarContactosEdit(data[0].vchEmpresaID);
            cargarContactosTelEdit(null, null);

            $('#AddOrEditClienteNET').modal('show');
        },
        error: function () {
            alert('Error en Servidor');
        }
    })
}

function cargarContactosEdit(id) {

    var tableC = $('#tblContactosEdit').DataTable();
    tableC.clear();

    tblContactosEdit = $('#tblContactosEdit').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        select: false,
        scrollY: '30vh',
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiContactos",
            type: "GET",
            dataType: "json",
            data: {
                empresaId: id,
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"lp><"clear">',
        columns: [
            {
                data: 'chContactoID', // 0
                title: "N°",
                visible: true,
                className: 'ps-2',
            },
            {
                data: 'vchNombre', // 1
                title: "Nombre",
            },
            {
                data: 'vchApellidoPaterno', // 1
                title: "Apellido Paterno",
            },
            {
                data: 'vchPuesto', // 4
                title: 'Puesto'
            },
            {
                data: 'vchEmail', // 2
                title: "E-mail",
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            // ajustarTablas('tblContactos', heightTableCon);
            // loaderOut();
        },
    });


}

function cargarContactosTelEdit(empresaId, id) {

    var tableCTE = $('#tblContactosTelEdit').DataTable();
    tableCTE.clear();

    tblContactosTelEdit = $('#tblContactosTelEdit').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: false,
        serverSide: true,
        select: false,
        scrollY: '13vh',
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiContactosTel",
            type: "GET",
            dataType: "json",
            data: {
                empresaId: empresaId,
                contactoId: id,
            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"lp><"clear">',
        columns: [
            {
                data: 'vchTelefonoID', // 0
                title: "Teléfono",
                className: 'ps-2',
            },
            {
                data: 'vchTipoTelefonoID', // 1
                title: "Tipo",
            },
        ],
        pageLength: -1,
        lengthMenu: [
            [50, 100, 150, 200, -1],
            [50, 100, 150, 200, "TODOS"],
        ],
        initComplete: function (settings, json) {
            // ajustarTablas('tblContactosTel', heightTableCon);
            // loaderOut();
        },
    });

}

function closeMClientes() {
    $("#AddOrEditClienteNET").find("#formAddOrEditClienteNET")[0].reset();
    $('#AddOrEditClienteNET').modal('hide');
}

function nuevaActividadCliente() {
    $('#AddOrEditActividadesCliente').modal('show');
}

function actividadesCliente(id) {
    $('#indexActividadesCliente').modal('show');
}

function closeMIndexActividadesCliente() {
    // $("#AddAddOrEditCliente").find("#formAddTicketMttoOrEditCliente")[0].reset();
    $('#indexActividadesCliente').modal('hide');
}

function mostrarClientes() {
    $("#clientes").addClass("active");
    $("#clientes").addClass("show");

    $("#clientes-tab").addClass("active");
    $("#clientes-tab").addClass("show");

    $("#contactos").removeClass("active");
    $("#contactos").removeClass("show");

    $("#contactos-tab").removeClass("active");
    $("#contactos-tab").removeClass("show");

    document.getElementById("clientes").style.display = "block";
    document.getElementById("contactos").style.display = "none";
    tblClientes.draw(false);
}

function mostrarClientesModal() {
    $("#clientes_edit").addClass("active");
    $("#clientes_edit").addClass("show");

    $("#clientes_edit-tab").addClass("active");
    $("#clientes_edit-tab").addClass("show");

    $("#contactos_edit").removeClass("active");
    $("#contactos_edit").removeClass("show");

    $("#contactos_edit-tab").removeClass("active");
    $("#contactos_edit-tab").removeClass("show");

    document.getElementById("clientes_edit").style.display = "block";
    document.getElementById("contactos_edit").style.display = "none";
}

function mostrarContactos() {
    $("#clientes").removeClass("active");
    $("#clientes").removeClass("show");

    $("#clientes-tab").removeClass("active");
    $("#clientes-tab").removeClass("show");

    $("#contactos").addClass("active");
    $("#contactos").addClass("show");

    $("#contactos-tab").addClass("active");
    $("#contactos-tab").addClass("show");

    document.getElementById("clientes").style.display = "none";
    document.getElementById("contactos").style.display = "block";

    var tableCAll = $('#tblContactosAll').DataTable();
    cargarContactosAll();

    // tableCAll.draw(false);

}

function mostrarContactosModal() {
    $("#clientes_edit").removeClass("active");
    $("#clientes_edit").removeClass("show");

    $("#clientes_edit-tab").removeClass("active");
    $("#clientes_edit-tab").removeClass("show");

    $("#contactos_edit").addClass("active");
    $("#contactos_edit").addClass("show");

    $("#contactos_edit-tab").addClass("active");
    $("#contactos_edit-tab").addClass("show");

    document.getElementById("clientes_edit").style.display = "none";
    document.getElementById("contactos_edit").style.display = "block";

    var tableCEdit = $('#tblContactosEdit').DataTable();
    tableCEdit.draw(false);

    var tableCTEdit = $('#tblContactosTelEdit').DataTable();
    tableCTEdit.draw(false);

}

