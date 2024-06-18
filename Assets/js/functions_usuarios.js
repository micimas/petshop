let tableUsuarios;
let rowTable = "";
document.addEventListener('DOMContentLoaded', function () {

    tableUsuarios = $('#tableUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            url: " " + base_url + "Assets/js/es-ES.json",
        },
        "ajax": {
            "url": " " + base_url + "Usuarios/getUsuarios",
            "dataSrc": "",
            "error": function () {
                alert("Error al cargar los datos ");
            },
        },
        "columns": [
            { "data": "idpersona" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "email_user" },
            { "data": "telefono" },
            { "data": "nombrerol" },
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

    if (document.querySelector("#formUsuario")) {
        let formUsuario = document.querySelector("#formUsuario");
        formUsuario.onsubmit = function (e) {
            e.preventDefault();
            let strIdentificacion = document.querySelector('#txtIdentificacion').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtApellido').value;
            let strEmail = document.querySelector('#txtEmail').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let intTipousuario = document.querySelector('#listRolid').value;
            let strPassword = document.querySelector('#txtPassword').value;
            let intStatus = document.querySelector('#listStatus').value;

            if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || intTipousuario == '') {
                Swal.fire("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains('is-invalid')) {
                    Swal.fire("Atención", "Por favor verifique los campos en rojo.", "error");
                    return false;
                }
            }

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/setUsuario';
            let formData = new FormData(formUsuario);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        if (rowTable == "") {
                            tableUsuarios.api().ajax.reload();
                        } else {
                            let htmlStatus = intStatus == 1 ?
                                '<span class="badge badge-success">Activo</span>' :
                                '<span class="badge badge-danger">Inactivo</span>';
                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = strApellido;
                            rowTable.cells[3].textContent = strEmail;
                            rowTable.cells[4].textContent = intTelefono;
                            rowTable.cells[5].textContent = document.querySelector("#listRolid").selectedOptions[0].text;
                            rowTable.cells[6].innerHTML = htmlStatus;
                            rowTable = "";
                        }
                        $('#modalFormUsuario').modal("hide");
                        formUsuario.reset();
                        Swal.fire("Usuarios", objData.msg, "success");
                    } else {
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
                return false;
            }
        }
    }

    if (document.querySelector("#formPerfil")) {
        let formPerfil = document.querySelector("#formPerfil");
        formPerfil.onsubmit = function (e) {
            e.preventDefault();

            let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
            let txtNombre = document.querySelector('#txtNombre').value;
            let txtApellido = document.querySelector('#txtApellido').value;
            let txtTelefono = document.querySelector('#txtTelefono').value;
            let txtEmail = document.querySelector('#txtEmail').value;
            // let txtPais = document.querySelector('#txtPais').value;
            // let twitter = document.querySelector('#Twitter').value;
            // let facebook = document.querySelector('#Facebook').value;
            // let instagram = document.querySelector('#Instagram').value;
            // let linkedin = document.querySelector('#Linkedin').value;
            // let txtDescripcion = document.querySelector('#txtDescripcion').value;
            let txtNit = document.querySelector('#txtNit').value;
            let txtNombreFiscal = document.querySelector('#txtNombreFiscal').value;
            let txtDirFiscal = document.querySelector('#txtDirFiscal').value;

            if (txtIdentificacion == '' || txtNombre == '' || txtApellido == '' || txtTelefono == '' || txtEmail == ''
                // || txtPais == '' || twitter == '' || facebook == '' || instagram == '' || linkedin == '' || txtDescripcion == '' || 
                || txtNit == '' || txtNombreFiscal == '' || txtDirFiscal == '') {
                Swal.fire("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains('is-invalid')) {
                    Swal.fire("Atención", "Por favor verifique los campos en rojo.", "error");
                    return false;
                }
            }

            let request = (window.XMLHttpRequest) ?
                new XMLHttpRequest() :
                new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/putPerfil';
            let formData = new FormData(formPerfil);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(request.responseText)
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire({
                            title: '',
                            text: objData.msg,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire("Error", objData.msg, "error");
                    }
                    // divLoading.style.display = "none";
                    return false;
                }
            }
        }
    };

    if (document.querySelector("#formCambiarContraseña")) {
        let formPerfil = document.querySelector("#formCambiarContraseña");
        formPerfil.onsubmit = function (e) {
            e.preventDefault();

            let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
            let txtContreña= document.querySelector('#actualContraseña').value;
            let txtContreñaNueva = document.querySelector('#nuevaContraseña').value;
            let txtReContreñaNueva = document.querySelector('#re_nueva_contraseña').value;

            if (txtContreña == '' || txtContreñaNueva == '' || txtReContreñaNueva == '' ) {
                Swal.fire("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }

            // let elementsValid = document.getElementsByClassName("valid");
            // for (let i = 0; i < elementsValid.length; i++) {
            //     if (elementsValid[i].classList.contains('is-invalid')) {
            //         Swal.fire("Atención", "Por favor verifique los campos en rojo.", "error");
            //         return false;
            //     }
            // }

            let request = (window.XMLHttpRequest) ?
                new XMLHttpRequest() :
                new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/putContraseña';
            let formData = new FormData(formPerfil);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(request.responseText)
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire({
                            title: '',
                            text: objData.msg,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire("Error", objData.msg, "error");
                    }
                    // divLoading.style.display = "none";
                    return false;
                }
            }
        }
    };


}, false);


window.addEventListener('load', function () {
    fntRolesUsuario();
}, false);

function fntRolesUsuario() {
    if (document.querySelector('#listRolid')) {
        let ajaxUrl = base_url + '/Roles/getSelectRoles';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                document.querySelector('#listRolid').innerHTML = request.responseText;
                $('#listRolid').selectpicker('render');
            }
        }
    }
}

function fntViewUsuario(idpersona) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                let estadoUsuario = objData.data.status == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
                document.querySelector("#celNombre").innerHTML = objData.data.nombres;
                document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celEmail").innerHTML = objData.data.email_user;
                document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
                $('#modalViewUser').modal('show');
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditUsuario(element, idpersona) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idUsuario").value = objData.data.idpersona;
                document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtApellido").value = objData.data.apellidos;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtEmail").value = objData.data.email_user;
                document.querySelector("#listRolid").value = objData.data.idrol;
                $('#listRolid').selectpicker('render');

                if (objData.data.status == 1) {
                    document.querySelector("#listStatus").value = 1;
                } else {
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');
            }
        }

        $('#modalFormUsuario').modal('show');
    }
}

function fntDelUsuario(idpersona) {
    Swal.fire({
        title: "Eliminar Usuario",
        text: "¿Realmente quiere eliminar el Usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/delUsuario';
            let strData = "idUsuario=" + idpersona;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire("Eliminar!", objData.msg, "success");
                        $('#tableUsuarios').DataTable().ajax.reload();
                    } else {
                        Swal.fire("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}



function openModalUsuario() {
    rowTable = "";
    document.querySelector('#idUsuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}

function openModalPerfil() {
    $('#modalFormPerfil').modal('show');
}