serve = base_path;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
// const FROM_PATTERN = "YYYY-MM-DD HH:mm:ss.SSS";
// const TO_PATTERN = "DD/MM/YYYY HH:mm";

// const FROM_PATTERN_SHORT = "YYYY-MM-DD";
// const TO_PATTERN_SHORT = "DD/MM/YYYY";

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
    tblUsuarios = $('#tblUsuarios').DataTable({
        destroy: true,
        pageResize: false,
        searchable: false,
        processing: true,
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
        dom: '<"top">rt<"bottom"lp><"clear">',
        columnDefs:[
            {
                // targets: [3],
                // render: $.fn.dataTable.render.moment(FROM_PATTERN, TO_PATTERN),
            },
        ],
        columns: [
            {
                data: 'id', // 0
                title: "N°",
            },
            {
                data: 'name', // 1
                title: "Nombre",
            },
            {
                data: 'email', // 5
                // render: function (data, type, row) {
                //     return ('<a class="cursor-pointer text-primary" onclick="openTicket(' + row.Id_Ticket + ', ' + row.inputPrivilegios + ')">' + data + '</a>');
                // },
                title: "Email",
            },
            {
                data: 'created_at',
                render: function(data, type, row){
                    return moment(data).format(TO_PATTERN)
                },
                title: 'Fecha Creación'
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
