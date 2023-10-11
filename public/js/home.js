serve = base_path;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
const FROM_PATTERN = "YYYY-MM-DD HH:mm:ss.SSS";
const TO_PATTERN = "DD/MM/YYYY HH:mm";

const FROM_PATTERN_SHORT = "YYYY-MM-DD";
const TO_PATTERN_SHORT = "DD/MM/YYYY";

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

});

function clientes() {
    window.location.href = serve + 'clientes';
}

function usuarios() {
    window.location.href = serve + 'usuarios';
}
