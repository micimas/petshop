let tableContactos;
tableContactos = $('#tableContactos').dataTable( {
    "aProcessing": true,
    "aServerSide": true,
    "language": {
        url: " " + base_url + "Assets/js/es-ES.json",
    },
    "ajax":{
        "url": " "+base_url+"/contactos/getContactos",
        "dataSrc": "",
        "error": function () {
            alert("Error al cargar los datos ");
        },
    },
    "columns":[
        {"data":"id"},
        {"data":"nombre"},
        {"data":"email"},
        {"data":"fecha"},
        {"data":"options"}
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


function fntViewInfo(idmensaje){
    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/contactos/getMensaje/'+idmensaje;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let objMesaje = objData.data;
                document.querySelector("#celCodigo").innerHTML = objMesaje.id;
                document.querySelector("#celNombre").innerHTML = objMesaje.nombre;
                document.querySelector("#celEmail").innerHTML = objMesaje.email;
                document.querySelector("#celFecha").innerHTML = objMesaje.fecha;
                document.querySelector("#celMensaje").innerHTML = objMesaje.mensaje;
                $('#modalViewMensaje').modal('show');
            }else{
                Swal.fire("Error", objData.msg , "error");
            }
        }
    } 
}

