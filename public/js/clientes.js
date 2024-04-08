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

    cargarClientes();
});

function iniciar() {

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 355).toString() + "px";

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

}

function cargarClientes() {

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 135).toString() + "px";

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
            url: serve + "apiClientes",
            type: "GET",
            dataType: "json",
        },
        language: {
            url: serve + "js/spanish-DT.json",
        },
        // dom: '<"top">rt<"bottom"i><"clear"p>',
        dom: '<"top"f>rt<"bottom"i><"clear"p>',
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

selectRowClientes('tblClientes');
