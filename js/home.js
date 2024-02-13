document.addEventListener('DOMContentLoaded', function() {
    Inicio()
});



function Inicio(){
    fetch("../proc/proc_home.php")
    .then(sapo => sapo.text())
    .then(peliculas =>{ 
        document.getElementById('home').innerHTML = peliculas
        addFiltros()
    })
}


function addFiltros()
{
    document.getElementById('year').addEventListener("change",filtro)
    document.getElementById('genero').addEventListener("change",filtro)
    document.getElementById("actor").addEventListener("keyup",filtro)
}

function deletFiltros()
{
    document.getElementById('year').removeEventListener("change", filtro);
    document.getElementById('genero').removeEventListener("change", filtro);
    document.getElementById("actor").removeEventListener("keyup", filtro);
}

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
