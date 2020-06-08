function buscarCliente() {
    var cedula = document.getElementById("cedula").value;
    if (cedula == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../controlador/buscar_T.php?cedula="+cedula+"&placa="+"",true);
    xmlhttp.send();
    }
    return false;
}

function buscarPlaca() {
    var placa = document.getElementById("placa").value;
    if (placa == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../controlador/buscar_T.php?placa="+placa+"&cedula="+"",true);
    xmlhttp.send();
    }

    return false;
}


function buscarClienteUnico() {
    var cedula = document.getElementById("cedula").value;
    if (cedula == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(cedula);
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../controlador/buscar_C.php?cedula="+cedula+"",true);
    xmlhttp.send();
    }
    
    return false;
}



