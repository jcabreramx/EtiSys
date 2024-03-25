function loaderON() {
    $(".loanding").fadeIn("slow");
}

function loaderOut() {
    $(".loanding").fadeOut("slow");
}

function ajustarTablas(table, heightTable) {
    $('#' + table).closest('.dataTables_scrollBody').css('height', heightTable);
}

function selectRow(tabla) {
    $('#' + tabla).on('click', 'tr', function () {
        var row = $(this);
        var td = document.getElementsByTagName('tr');

        for (var i = 0; i < td.length; i++) {
            td[i].classList.remove('selectedCte');
        }

        row[0].classList = 'selectedCte';
    });

}

function selectRowClientes(tabla) {
    $('#' + tabla).on('click', 'tr', function () {
        var row = $(this);
        var td = document.getElementsByTagName('tr');

        for (var i = 0; i < td.length; i++) {
            td[i].classList.remove('selectedCte');
        }

        row[0].classList = 'selectedCte';
    });

}

function selectRowContactos(tabla) {
    $('#' + tabla).on('click', 'tr', function () {
        var row = $(this);
        var td = document.getElementsByTagName('tr');

        for (var i = 0; i < td.length; i++) {
            td[i].classList.remove('selectedCto');
        }

        row[0].classList = 'selectedCto';
    });

}
function selectRowContactosTel(tabla) {
    $('#' + tabla).on('click', 'tr', function () {
        var row = $(this);
        var td = document.getElementsByTagName('tr');

        for (var i = 0; i < td.length; i++) {
            td[i].classList.remove('selectedCtoTel');
        }

        row[0].classList = 'selectedCtoTel';
    });

}

// function selectRowFocus(tabla) {
//     $('#' + tabla).on('focus', 'tr', function () {
//         var row = $(this);
//         var td = document.getElementsByTagName('tr');

//         for (var i = 0; i < td.length; i++) {
//             td[i].classList.remove('selected');
//         }

//         row[0].classList = 'selected';
//     });

// }
