document.addEventListener('DOMContentLoaded', function() {
    eventsNavbar()
    // Paginacion()
    const btnLove = document.querySelector('.btn-love');
    btnLove.addEventListener('click',function(e){
        if(!this.classList.contains('act')){
            this.className += " act";
            let Tl = new TimelineMax({});
            Tl.to('.fa',0.1,{
                scale:0,
                ease:Back.easeNone,
            })
            Tl.to('.fa',0.2,{
                delay:0.1,
                scale:1.3,
                color:'#e3274d',
                ease:Ease.easeOut
            })
            Tl.to('.fa',0.2,{
                scale:1,
                ease:Ease.easeOut
            })
        }else{
            this.classList.remove('act');
            TweenMax.set('.fa',{
                color:'#c0c1c3',
            })
        }
    })
});

function Paginacion(num) {
    var url = window.location.href;
    if (url.indexOf('?') !== -1) {
        var parametrosGET = url.split('?')[1].split('&');
        console.log('Variables de GET detectadas:');
        
        // Itera sobre los parámetros de consulta y muestra el nombre y el valor
        for (var i = 0; i < parametrosGET.length; i++) {
            var parametro = parametrosGET[i].split('=');
            var nombre = parametro[0];
            var valor = parametro[1];
            console.log(nombre + ': ' + valor);
            if(nombre == "start"){
                // ELIMINAMOS LAS VARIABLES DE GET QUE INTENTA INSERTAR
                deleteGet()
                // PAGINAMOS EL INICIO
                Inicio()
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
        // Aquí puedes realizar acciones adicionales según tus necesidades
    } else {
        Inicio()
        // console.log('No hay variables de GET en la URL.');
    }
}

// LIMPIAR VARIABLES GET DE LA URL
function deleteGet() {
    // Modifica la URL sin parámetros de consulta
    history.pushState({}, document.title, window.location.pathname);
}


// ASIGNACION DE EVENTOS A LOS BOTONES DEL NAV
function eventsNavbar() {
    // FUNCIONES DE PAGINACION
    document.getElementById('add').addEventListener("click",addForm)
    document.getElementById('inicio').addEventListener("click",Inicio)



    // EVENTO PARA ELIMINAR VARIABLES DE GET
    document.getElementById('add').addEventListener("click",deleteGet)
    document.getElementById('inicio').addEventListener("click",deleteGet)
}


// PAGINACION DE LA PAGINA DE HOME
function Inicio(){
    fetch("../proc/proc_home.php")
    .then(sapo => sapo.text())
    .then(peliculas =>{ 
        document.getElementById('home').innerHTML = peliculas
        addFiltros()
    })
}

// PAGINACION PELICULA EN CONCRETO CON SU ID
function movie(id) {
    // ID pelicula por JSON
    var pelicula = {
        id: id
    }
    fetch("../proc/proc_movie.php",{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'pelicula=' + encodeURIComponent(JSON.stringify(pelicula))
    })
    .then(contenido =>contenido.text())
    .then(texto => {
        document.getElementById('home').innerHTML = texto
    })
}


// AÑADIMOS EVENTOS A LOS FILTROS DE LA PAGINACIÓN DEL FILTRO PARA QUE SEA
// AL MOMENTO
function addFiltros(){
    document.getElementById('year').addEventListener("change",filtro)
    document.getElementById('genero').addEventListener("change",filtro)
    document.getElementById("actor").addEventListener("keyup",filtro)
}

// ELIMINAMOS LOS EVENTOS AL QUITAR EL MENU DE HOME
function deletFiltros(){
    document.getElementById('year').removeEventListener("change", filtro);
    document.getElementById('genero').removeEventListener("change", filtro);
    document.getElementById("actor").removeEventListener("keyup", filtro);
}



function alertas(num) {
    if(num == 1){
        var icon = ""
        var title = "Bienvenid@ y Disfruta"
    }else{
        var icon = "warning"
        var title = "No reconocemos la URL"
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


// FUNCION PARA QUE LOS FILTROS FUNCIONEN SEGÚN EL CRITERIO QUE PONGA EL USUARIO
function filtro() {
    var filtros = {
        actor: document.getElementById('actor').value,
        genero:  document.getElementById('genero').value,
        year: document.getElementById('year').value
    }
    fetch("../proc/proc_filtro.php",{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'datos=' + encodeURIComponent(JSON.stringify(filtros))
    })
    
    .then(contenido =>contenido.text())
    .then(texto => document.getElementById('contenido').innerHTML = texto)
}

// AÑADIR FORMULARIO DE 
function addForm(){
    fetch("../proc/proc_form_peli.php")
    .then(formulario => formulario.text())
    .then(form =>{
        document.getElementById('home').innerHTML = form
        document.getElementById('nom_peli').addEventListener("keyup",FormNombre)
        document.getElementById('sinopsis').addEventListener("blur",FormSinopsis)
        document.getElementById('genero_peli').addEventListener("change",FormGenero)
        document.getElementById('dur_peli').addEventListener("keyup",FormDur)
        document.getElementById('year_peli').addEventListener("keyup",Formyear)
        document.getElementById('portada').addEventListener("change",FormPortada)
    })
}

function FormGenero() {
    var genero = document.getElementById('genero_peli')
    if (genero.value == 0 && genero.value == "0") {
        genero.classList.remove('is-valid');
        genero.classList.add('is-invalid');
    } else {
        genero.classList.remove('is-invalid');
        genero.classList.add('is-valid');
    }
}

function FormDur() {
    var duracion = document.getElementById('dur_peli')
    if (duracion.value < 60) {
        duracion.classList.remove('is-valid');
        duracion.classList.add('is-invalid');
    } else {
        duracion.classList.remove('is-invalid');
        duracion.classList.add('is-valid');
    }
}

function Formyear() {
    var year = document.getElementById('year_peli')
    if (year.value < 1896) {
        year.classList.remove('is-valid');
        year.classList.add('is-invalid');
    } else {
        duracion.classList.remove('is-invalid');
        duracion.classList.add('is-valid');
    }
}


function validarForm(){
    var nom = document.getElementById('nom_peli').value
    var genero = document.getElementById('genero_peli'),value
    var sinopsis = document.getElementById('sinopsis').value

}

function FormSinopsis(){
    var nom = document.getElementById('sinopsis')
    if (nom.value === "") {
        nom.classList.remove('is-valid');
        nom.classList.add('is-invalid');
    } else {
        if (nom.value.length >= 100) {
            nom.classList.remove('is-invalid');
            nom.classList.add('is-valid');
        }else{
            nom.classList.remove('is-valid');
            nom.classList.add('is-invalid');
        }
        // nom.classList.remove('is-invalid');
        // nom.classList.add('is-valid');
    }
}

function FormNombre(){
    var nom = document.getElementById('nom_peli')
    console.log(nom.value.length)
        if (nom.value === "") {
            nom.classList.remove('is-valid');
            nom.classList.add('is-invalid');
        } else {
            nom.classList.remove('is-invalid');
            nom.classList.add('is-valid');
        }
}

function FormPortada(event) {
    const input = event.target;
    const previewImg = document.getElementById('img-preview');
    const file = input.files[0];
    if (file) {
        // Verifica si el archivo tiene una extensión de imagen permitida
        const allowedExtensions = ['jpg', 'jpeg', 'png'];
        const fileExtension = file.name.split('.').pop().toLowerCase();
        if (allowedExtensions.includes(fileExtension)) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            // Muestra un mensaje de error si el archivo no es una imagen permitida
            Swal.fire({
                title: "Archivo Incompatible",
                text: "Por favor, seleccione un archivo de imagen válido (jpg, jpeg, png)",
                icon: "warning"
            });
            
            // alert('Por favor, selecciona un archivo de imagen válido (jpg, jpeg, png, gif).');
            input.value = ''; // Limpia el valor del input para evitar que se cargue el archivo no permitido
            previewImg.src = '../rsc/movie/default.jpg'; // También puedes limpiar la vista previa si ya hay una imagen cargada
        }
    } else {
        previewImg.src = '../rsc/movie/default.jpg';
    }
}




// -------------------ESTILOS NAVBAR-----------------------

/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/ 
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))
