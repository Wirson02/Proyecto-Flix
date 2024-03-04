document.addEventListener('DOMContentLoaded', function() {
    // Inicio()
    eventsNavbar()
});

// ASIGNACION DE EVENTOS A LOS BOTONES DEL NAV
function eventsNavbar() {
    document.getElementById('add').addEventListener("click",addForm)
    document.getElementById('inicio').addEventListener("click",Inicio)
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
        document.getElementById('portada').addEventListener("change",FormPortada)


    })
    // document.getElementById('genero').addEventListener("change",validarForm)
    // document.getElementById("actor").addEventListener("keyup",validarForm)
}

function validarForm(){
    var form = document.getElementById('form-addmovie')
    var nom = document.getElementById('nom_peli').value
    var genero = document.getElementById('genero_peli'),value
    var sinopsis = document.getElementById('sinopsis').value

}

function FormSinopsis(){
    var sinopsis = document.getElementById('sinopsis')
    console.log(nom.value.length)
    if (nom.value === "") {
        nom.classList.remove('is-valid');
        nom.classList.add('is-invalid');
    } else {
        if (nom.value.length >= 100) {
            
        }
        nom.classList.remove('is-invalid');
        nom.classList.add('is-valid');
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
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const fileExtension = file.name.split('.').pop().toLowerCase();
        if (allowedExtensions.includes(fileExtension)) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            // Muestra un mensaje de error si el archivo no es una imagen permitida
            alert('Por favor, selecciona un archivo de imagen válido (jpg, jpeg, png, gif).');
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
