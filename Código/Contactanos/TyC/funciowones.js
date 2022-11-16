console.log("probando, probando");
function TyC() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("ccontenedorModal").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","terminosYCondiciones.html",true);
    xmlhttp.send();
    document.getElementById("contenedorModal").style.display="initial";
}