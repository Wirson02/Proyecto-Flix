document.addEventListener('DOMContentLoaded', function() {
    Animaciones()//
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
                deleteGet()
                // PONEMOS LA ALERTA QUE QUERAMOS 
                alertas(1);
                return
            }
            if (nombre == "id") {
                console.log("PAGNACION DE LA PELICULA CON SU ID");
                deleteGet()
                movie(valor);
                return
            }else{
                // ELIMINAMOS LAS VARIABLES DE GET QUE INTENTA INSERTAR
                deleteGet()
                // PAGINAMOS EL INICIO
                Inicio()
                // PONEMOS LA ALERTA QUE QUERAMOS 
                alertas(2);
                return
            }
        }
    } else {
        Inicio()
    }
}
// LIMPIAR VARIABLES GET DE LA URL
function deleteGet() {
    // Modifica la URL sin parámetros de consulta
    history.pushState({}, document.title, window.location.pathname);
}

function alertas(num) {
	
}