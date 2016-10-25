
$(document).ready(function () {

    $("#preEnunciado").css("display", "none");
    $("#mnuEnunciado").mouseover(function () {
        $("#preEnunciado").css("display", "block");
    });
    $("#mnuEnunciado").mouseout(function () {
        $("#preEnunciado").css("display", "none");
    });
});

function MostrarGrilla() {

    var pagina = "./nexoAdministrador.php";

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "text",
        data: {queHago: "mostrarGrilla"},
        async: true
        })
        .done(function (tabla) {
            console.log("MostrarGrilla: "+tabla);
            $("#divGrilla").html(tabla);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });

}

function CargarFormCelular() {

    var pagina = "./nexoAdministrador.php";

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "text",
        data: {queHago: "cargarForm"},
        async: true
        })
        .done(function (form) {

            $("#divFrm").html(form);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
}
function CargarFormEliminarMascota() {

    var pagina = "./nexoAdministrador.php";

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "text",
        data: {queHago: "cargarFormEliminar"},
        async: true
        })
        .done(function (form) {

            $("#divFrm").html(form);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
}

function AgregarCelular() {
    var pagina = "./nexoAdministrador.php";
    var sim;
    if ($("#rdoSIMUno").is(':checked')) {
        var sim = "1";
    }else{
        var sin = "2";
    }
    var marca = $("#txtMarca").val();
    var so = $("#cboSO").val();

    var celular = {"marca":marca,"so":so,"sim":sim};


    //crear objeto JSON

    alert("Implementar case \"agregarCelular\"");

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
            queHago: "agregarCelular",
            celular: celular
        },
        async: true
    })
    .done(function (objJson) {
        console.log(objJson);

        if (!objJson.Exito) {
            alert(objJson.Mensaje);
            return;
        }

        alert(objJson.Mensaje);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });

}

function EliminarMascota() {

    if (!confirm("Desea ELIMINAR la Mascota??")) {
        return;
    }

    alert("Implementar Eliminar Mascota....");
}

function CargarFormSubirArchivo(){
    
    var pagina = "./nexoAdministrador.php";

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "text",
        data: {queHago: "cargarFormSubir"},
        async: true
        })
        .done(function (form) {

            $("#divFrm").html(form);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    
}

function SubirArchivo() {

    alert("Implementar Subir archivo....");
}

function Validar(objJson) {

    alert("Implementar validaciones...");

    return true;
}