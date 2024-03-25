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
    iniciarContactos();
});

function iniciarContactos(){

    homeHeigthContactos = document.getElementById("home-section");
    card_general_contactos = document.getElementById("card_general_contactos");
    card_general_contactos.style.height = (homeHeigthContactos.clientHeight - 65).toString() + "px";
    heightTableContactos = (card_general_contactos.clientHeight - 355).toString() + "px";

    $('#tblContactosAll').DataTable({
        destroy: true,
        scrollY: false,
        scrollX: true,
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"i><"clear">',
        initComplete: function (settings, json) {
            ajustarTablas('tblContactosAll', heightTableContactos);
            loaderOut();
        },
        infoCallback: function (settings, start, end, max, total, pre) {
            if (total == 0) return "<strong class='ml-2'>Aplicar Búsqueda</strong>";
        },
    });
}

function cargarContactosAll(){

    homeHeigthContactos = document.getElementById("home-section");
    card_general_contactos = document.getElementById("card_general_contactos");
    card_general_contactos.style.height = (homeHeigthContactos.clientHeight - 65).toString() + "px";
    heightTableContactos = (card_general_contactos.clientHeight - 355).toString() + "px";

    nombreContacto = $('#searchNombreContacto').val();
    nombreCortoContacto = $('#searchNombreCortoContacto').val();
    origenContacto = $('#searchOrigenContacto').val();
    tipoContacto = $('#searchTipoContacto').val();
    grupoContacto = $('#searchGrupoContacto').val();
    agenteContacto = $('#searchAgenteContacto').val();
    grupoIdsContacto = null;
    ultimaLetraContacto = nombreContacto.slice(-1);
    // var table = $('#tblClientes').DataTable();
    // table.clear();
    ajustarTablas('tblContactosAll', heightTableContactos);

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
        scrollCollapse: false,
        paginate: true,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "ASC"],
        ],
        ajax: {
            url: serve + "apiClientes",
            type: "GET",
            dataType: "json",
            data: {
                nombre: nombreContacto,
                nombreCorto: nombreCortoContacto,
                origen: origenContacto,
                tipo: tipoContacto,
                grupo: grupoContacto,
                agente: agenteContacto,
                grupoIds: grupoIdsContacto,
                ultimaLetra: ultimaLetraContacto,

            },
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        dom: '<"top">rt<"bottom"i><"clear"p>',
        columnDefs:[
            {
                targets: [7, 8],
                orderable: false
                // render: $.fn.dataTable.render.moment(FROM_PATTERN, TO_PATTERN),
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
                data: 'vchDescripcionTipoCliente', // 3
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
                render: function(data, type, row){
                    return '<button class="btn btn-info btn-flat ms-2 rounded-btn btn-sm" onclick="editarCliente(' + row.vchEmpresaID + ')"><i class="fas fa-pencil-alt"></i></button>';
                },
                title: ''
            },
            {
                data: 'vchClave', // 8
                render: function(data, type, row){
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
            ajustarTablas('tblContactosAll', heightTableContactos);
            loaderOut();
        },
        infoCallback: function (settings, start, end, max, total, pre) {
            if (total == 0) return "<strong class='ml-2'>No se econtraron Clientes</strong>";
            if (total == 1) return '<strong class="ml-2">' + total + ' Cliente Encontrado</strong>';
            return '<strong class="ml-2">' + end + ' de ' + total + ' Clientes Encontrados</strong>';
        },
    });

}

function limpiarContactosAll(){
    ajustarTablas('tblContactosAll', heightTableContactos);
    nombreContacto = $('#searchNombreContacto').val('');
    nombreCortoContacto = $('#searchNombreCortoContacto').val('');
    origenContacto = $('#searchOrigenContacto').val('');
    tipoContacto = $('#searchTipoContacto').val('');
    grupoContacto = $('#searchGrupoContacto').val('');
    agenteContacto = $('#searchAgenteContacto').val('');
    var tableCAll = $('#tblContactosAll').DataTable();
    tableCAll.clear();

    iniciarContactos();
}

// function cargarContactosAll(id){

//     var tableC = $('#tblContactos').DataTable();
//     tableC.clear();

//     tblContactos = $('#tblContactos').DataTable({
//         destroy: true,
//         pageResize: false,
//         searchable: false,
//         processing: false,
//         serverSide: true,
//         // rowId: "Id_Ticket",
//         select: false,
//         scrollY: false,
//         scrollX: true,
//         scrollCollapse: true,
//         paginate: false,
//         stateSave: false,
//         deferRender: false,
//         order: [
//             [0, "DESC"],
//         ],
//         ajax: {
//             url: serve + "apiContactos",
//             type: "GET",
//             dataType: "json",
//             data: {
//                 empresaId: id,
//             },
//         },
//         language: {
//             url: serve + "js/spanish-DT.json",
//         },
//         dom: '<"top">rt<"bottom"lp><"clear">',
//         columns: [
//             {
//                 data: 'chContactoID', // 0
//                 title: "N°",
//                 visible: false,
//             },
//             {
//                 data: 'vchNombre', // 1
//                 render: function(data, type, row){
//                     return data + ' ' + row.vchApellidoPaterno + ' ' + row.vchApellidoMaterno
//                 },
//                 title: "Nombre",
//                 className: 'ps-2',
//             },
//             {
//                 data: 'vchEmail', // 2
//                 title: "E-mail",
//             },
//             {
//                 data: 'vchTitulo', // 3
//                 title: "Titulo",
//             },
//             {
//                 data: 'vchPuesto', // 4
//                 title: 'Puesto'
//             },
//             {
//                 data: 'chSexo', // 5
//                 title: 'Sexo'
//             },
//             {
//                 data: 'vchHorario', // 6
//                 title: 'Horario'
//             },
//         ],
//         pageLength: -1,
//         lengthMenu: [
//             [50, 100, 150, 200, -1],
//             [50, 100, 150, 200, "TODOS"],
//         ],
//         initComplete: function (settings, json) {
//             ajustarTablas('tblContactos', heightTableCon);
//             loaderOut();
//         },
//     });


// }

selectRowContactos('tblContactosAll');

// $("#tblContactosAll tbody").on("click", "td", function() {
//     data = tblContactosAll.row($(this).parents("tr")).data();
//     empresaId = data.vchEmpresaID;
//     id = data.chContactoID;
//     cargarContactosTel(empresaId, id);
// });

function nuevoContacto(){
    $('#AddOrEditContacto').modal('show');
}

function editarContacto(id){
    $('#AddOrEditContacto').modal('show');
}

function closeMClontactos() {
    // $("#AddAddOrEditCliente").find("#formAddTicketMttoOrEditCliente")[0].reset();
    $('#AddOrEditContacto').modal('hide');
}

// function nuevaActividadCliente(){
//     $('#AddOrEditActividadesCliente').modal('show');
// }

// function actividadesCliente(id){
//     $('#indexActividadesCliente').modal('show');
// }

// function closeMIndexActividadesCliente() {
//     // $("#AddAddOrEditCliente").find("#formAddTicketMttoOrEditCliente")[0].reset();
//     $('#indexActividadesCliente').modal('hide');
// }

