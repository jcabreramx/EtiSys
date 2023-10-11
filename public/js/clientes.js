serve = base_path;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

$(document).ajaxStart(function () {
    loaderON();
});

$(document).ajaxStop(function () {
    loaderOut();
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {

    homeHeigth = document.getElementById("home-section");
    cardGeneral = document.getElementById("card_general");
    cardGeneral.style.height = (homeHeigth.clientHeight - 65).toString() + "px";
    heightTable = (cardGeneral.clientHeight - 105).toString() + "px";

    console.log(homeHeigth.clientHeight);

    tblClientes = $('#tblClientes').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: true,
        serverSide: true,
        // rowId: "Id_Ticket",
        select: true,
        scrollY: heightTable,
        scrollX: true,
        scrollCollapse: true,
        paginate: false,
        stateSave: false,
        deferRender: false,
        order: [
            [0, "DESC"],
        ],
        ajax: {
            url: serve + "apiClientes",
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
        dom: '<"top">rt<"bottom"lp><"clear">',
        columnDefs:[
            {
                // targets: [3],
                // render: $.fn.dataTable.render.moment(FROM_PATTERN, TO_PATTERN),
            },
        ],
        columns: [
            {
                data: 'vchEmpresaID', // 0
                title: "N°",
            },
            {
                data: 'vchNombre', // 1
                title: "Nombre",
            },
            {
                data: 'vchRFC', // 5
                // render: function (data, type, row) {
                //     return ('<a class="cursor-pointer text-primary" onclick="openTicket(' + row.Id_Ticket + ', ' + row.inputPrivilegios + ')">' + data + '</a>');
                // },
                title: "RFC",
            },
            {
                data: 'vchCurp',
                // render: function(data, type, row){
                //     return moment(data).format(TO_PATTERN)
                // },
                title: 'CURP'
            },
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

});
