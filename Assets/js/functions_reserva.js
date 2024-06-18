let tableReserva;
tableReserva = $('#tableReserva').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "language": {
        url: " " + base_url + "Assets/js/es-ES.json",
    },
    "ajax": {
        "url": " " + base_url + "Reserva/getReservaAll",
        "dataSrc": "",
        "error": function () {
            alert("Error al cargar los datos ");
        },
    },
    "columns": [
        { "data": "idreserva" },
        { "data": "nombres" },
        { "data": "apellidos" },
        { "data": "tipo" },
        { "data": "fecha" },
        { "data": "status" },
        { "data": "options" }
    ],
    // 'dom': 'lBfrtip',
    // 'buttons': [
    //     {
    //         "extend": "copyHtml5",
    //         "text": "<i class='far fa-copy'></i> Copiar",
    //         "titleAttr":"Copiar",
    //         "className": "btn btn-secondary"
    //     },{
    //         "extend": "excelHtml5",
    //         "text": "<i class='fas fa-file-excel'></i> Excel",
    //         "titleAttr":"Esportar a Excel",
    //         "className": "btn btn-success"
    //     },{
    //         "extend": "pdfHtml5",
    //         "text": "<i class='fas fa-file-pdf'></i> PDF",
    //         "titleAttr":"Esportar a PDF",
    //         "className": "btn btn-danger"
    //     },{
    //         "extend": "csvHtml5",
    //         "text": "<i class='fas fa-file-csv'></i> CSV",
    //         "titleAttr":"Esportar a CSV",
    //         "className": "btn btn-info"
    //     }
    // ],
    "responsive": true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order": [[0, "asc"]]
});


function fntViewInfo(idreserva) {
    let request = (window.XMLHttpRequest) ?
        new XMLHttpRequest() :
        new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + 'Reserva/getReserva/' + idreserva;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            console.log(objData)
            if (objData.status) {
                let reserva = objData.data;
                document.getElementById("celCodigo").innerHTML = reserva.idreserva;
                document.getElementById("celNombre").innerHTML = reserva.nombres;
                document.getElementById("celApellido").innerHTML = reserva.apellidos;
                document.getElementById("celTelefono").innerHTML = reserva.telefono;
                document.getElementById("celEmail").innerHTML = reserva.email_user;
                document.getElementById("celTipo").innerHTML = reserva.tipo;
                document.getElementById("celMotivo").innerHTML = reserva.motivo;
                document.getElementById("celFecha").innerHTML = reserva.fecha;
                document.getElementById("celHora").innerHTML = reserva.hora_reserva;
                document.getElementById("celDatecreated").innerHTML = reserva.datecreated;
                document.getElementById("celStatus").innerHTML = reserva.status;
                $('#modalViewReserva').modal('show');
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

