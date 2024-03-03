document.addEventListener('DOMContentLoaded', function() {
    // Inicio()
});


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

function addForm(){
    fetch("../proc/proc_form_peli.php")
    .then(formulario => formulario.text())
    .then(form => document.getElementById('home').innerHTML = form)

    document.getElementById('genero_peli').addEventListener("keyup",validarForm)
    document.getElementById('genero').addEventListener("change",validarForm)
    document.getElementById("actor").addEventListener("keyup",validarForm)
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

function validarForm(){
    var form = document.getElementById('')
    var nom = document.getElementById('').value
    var genero = document.getElementById(''),value
    var descripcion = document.getElementById('').value

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
