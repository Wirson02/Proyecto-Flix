document.addEventListener('DOMContentLoaded', function() {
    Animaciones()
    Paginacion()
});


function Animaciones() {
    document.getElementById('signUp').addEventListener('click', () => {
        document.getElementById('container').classList.add("right-panel-active");
	});

	document.getElementById('signIn').addEventListener('click', () => {
		document.getElementById('container').classList.remove("right-panel-active");
	});
}

function ValForm() {
}

function Paginacion() {
    var url = window.location.href;
    if (url.indexOf('?') !== -1) {
        var parametrosGET = url.split('?')[1].split('&');
        for (var i = 0; i < parametrosGET.length; i++) {
            var parametro = parametrosGET[i].split('=');
            var nombre = parametro[0];
            var valor = parametro[1];
            console.log(nombre + ': ' + valor);
            if(nombre == "alerta"){
                // ELIMINAMOS LAS VARIABLES DE GET QUE INTENTA INSERTAR
                // deleteGet()
                console.log("deteccion de alertas, ".valor);
                // PONEMOS LA ALERTA QUE QUERAMOS 
                alertas(valor);
                deleteGet()
                return
            }
        }
    }
}
// LIMPIAR VARIABLES GET DE LA URL
function deleteGet() {
    // Modifica la URL sin parámetros de consulta
    history.pushState({}, document.title, window.location.pathname);
}

function alertas(num) {
    if(num == 1){
        var icon = "info"
        var title = "Estamos valorando tu peticion de acceso"
    }
    if (num == 2) {
        var icon = "warning"
        var title = "Cuenta Desahbilitada, consulte con un administrador"
    }
    if (num == 3) {
        var icon = "warning"
        var title = "Revisa las credenciales"
    }
    if (num == 4) {
        var icon = "warning"
        var title = "Debes de iniciar session para acceder"
    }
    if (num == 5) {
        var icon = "success"
        var title = "Debes de iniciar session para acceder"
    }

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: icon,
        title: title
    });
}
