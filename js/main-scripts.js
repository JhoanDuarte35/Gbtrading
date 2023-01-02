$(document).ready(function(){
    $("#idbusqueda").keyup(function(e){  
        if(e.keyCode==13){
            search_producto();
        }
    });
    });

function search_producto(){
    window.location.href="busqueda.php?text="+$("#idbusqueda").val();
}

var eye = document.getElementById('Eye');
var contraseña = document.getElementById('contraseña');
eye.addEventListener("click",function(){
if (contraseña.type === "password") {
    contraseña.type = "text";
    eye.style.opacity = 0.8;
} else {
    contraseña.type = "password";
    eye.style.opacity = 0.2;
}
})