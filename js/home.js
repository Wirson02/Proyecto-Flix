document.addEventListener('DOMContentLoaded', function() {
    Paginacion()
    eventsNavbar();
});

function Paginacion() {
    
    var url = window.location.href;
    if (url.indexOf('?') !== -1) {
        var parametrosGET = url.split('?')[1].split('&');
        console.log('Variables de GET detectadas:');
        for (var i = 0; i < parametrosGET.length; i++) {
            var parametro = parametrosGET[i].split('=');
            var nombre = parametro[0];
            var valor = parametro[1];
            console.log(nombre + ': ' + valor);
            if(nombre == "start"){
                // PAGINAMOS EL INICIO
                Inicio();
                alertas(1);
                eventsNavbar();
                deleteGet();
            }
            if (nombre == "id") {
                movie(valor);
                eventsNavbar();
                // deleteGet()
            }

            // else{
            //     // PAGINAMOS EL INICIO
            //     Inicio()
            //     // PONEMOS LA ALERTA QUE QUERAMOS 
            //     alertas(2);
            //     // ELIMINAMOS LAS VARIABLES DE GET QUE INTENTA INSERTAR
            //     deleteGet()
            // }
        }
        // Aquí puedes realizar acciones adicionales según tus necesidades
    } else {
        Inicio()
        // console.log('No hay variables de GET en la URL.');
    }
}

// LIMPIAR VARIABLES GET DE LA URL
function deleteGet() {
    history.pushState({}, document.title, window.location.pathname);
}


// ASIGNACION DE EVENTOS A LOS BOTONES DEL NAV
function eventsNavbar() {
    // FUNCIONES DE PAGINACION
    document.getElementById('inicio').addEventListener("click",Inicio)
    document.getElementById('inicio').addEventListener("click",deleteGet)
    document.getElementById('favoritos').addEventListener("click",favlist)
    
    // EVENTO PARA ELIMINAR VARIABLES DE GET
    document.getElementById('crud').addEventListener("click",crud)
    document.getElementById('add').addEventListener("click",addForm)
    document.getElementById('add').addEventListener("click",deleteGet)
    
}

function CrudPeti() {
    const div = document.getElementById('perfil')
    fetch("../proc/proc_crud_peticiones.php")
    .then(texto => texto.text())
    .then(crud =>{
        div.innerHTML = crud
        document.querySelectorAll('.acept-peti').forEach(item => {
            item.addEventListener('click', event => {
                aceptPeti(item.value);
            });
        });
        document.querySelectorAll('.deneg-peti').forEach(item => {
            item.addEventListener('click', event => {
                denegPeticion(item.value);
            });
        });
    })
}

function aceptPeti(id) {
    var usr = { 
        id: id,
        usr: 1
    }

    fetch("../proc/proc_change_usr.php",{ method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'datos=' + encodeURIComponent(JSON.stringify(usr))
    })
    .then(texto => texto.text())
    .then(info =>{
        if (info == "ABLE") {
            alertas(9);
            CrudPeti();
        }else{
            console.log(info)
        }
    })
}

function denegPeticion(id) {
    var usr = { 
        id: id,
        usr: 2
    }
    fetch("../proc/proc_change_usr.php",{ method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'datos=' + encodeURIComponent(JSON.stringify(usr))
    })
    .then(texto => texto.text())
    .then(info =>{
        if (info == "DISSABLE") {
            alertas(10);
            CrudPeti();
        }else{
            console.log(info)
        }
    })
}

function CrudMovie() {
    const div = document.getElementById('perfil')
    fetch("../proc/proc_crud_movie.php")
    .then(texto => texto.text())
    .then(crud =>{
        div.innerHTML = crud
        document.querySelectorAll('.editar_mvi').forEach(item => {
            item.addEventListener('click', event => {
                mviModifi(item.value);
            });
        });
        document.querySelectorAll('.delete_mvi').forEach(item => {
            item.addEventListener('click', event => {
                mviDelete(item.value);
            });
        });
    })
}

function mviDelete(id) {
    Swal.fire({
        title: "Estas seguro?",
        text: "Si lo eliminas no hay vuelta altras",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            var usr = { id: id}
            fetch("../proc/proc_delete_mvi.php",{ method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'datos=' + encodeURIComponent(JSON.stringify(usr))
            })
            .then(contenido => contenido.text())
            .then(confirmacion => {
                if (confirmacion == "OK") {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Has eliminado la pelicula.",
                        icon: "success"
                    });
                }else{
                    Swal.fire({
                        title: "Hubo un Error!",
                        text: confirmacion,
                        icon: "error"
                    });
                }
                crudUser()
            })
        }
    });

}

function crudUser() {
    fetch("../proc/proc_crud_usr.php")
    .then(text => text.text())
    .then(crud =>{
        document.getElementById('perfil').innerHTML = crud
        document.querySelectorAll('.editar_usr').forEach(item => {
            item.addEventListener('click', event => {
                usrModificar(item.value);
            });
        });
        document.querySelectorAll('.delete_usr').forEach(item => {
            item.addEventListener('click', event => {
                usrDelete(item.value);
            });
        });
    })
}

function crud() {
    fetch("../proc/proc_crud_home.php")
    .then(texto => texto.text())
    .then(crud =>{
        document.getElementById('home').innerHTML = crud

        document.getElementById('user_crud').addEventListener("click",crudUser)
        document.getElementById('movie_crud').addEventListener("click",CrudMovie)
        document.getElementById('peti_crud').addEventListener("click",CrudPeti)
        CrudMovie()
    })
}



function usrModificar(id) {
    var usr = { id: id }
    fetch("../proc/proc_form_usr.php",{ method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'datos=' + encodeURIComponent(JSON.stringify(usr))
    })
    .then(content => content.text())
    .then(html => {
        Swal.fire({
            title: "Edición de usuario",
            html: html,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var usr = { 
                    id: id,
                    name: document.getElementById('usr-name').value,
                    apellido: document.getElementById('usr-ape').value,
                    mail: document.getElementById('usr-mail').value,
                    pwd: document.getElementById('usr-pwd').value,
                    rol: document.getElementById('usr-rol').value
                }
                fetch("../proc/proc_modifi_usr.php",{ method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'datos=' + encodeURIComponent(JSON.stringify(usr))
                })
                .then(texto => texto.texto())
                .then()
                
                Swal.fire("Saved!", "", "success");
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
        });
    })
}

function usrDelete(id) {
    Swal.fire({
        title: "Estas seguro?",
        text: "Si lo eliminas no hay vuelta altras",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            var usr = { id: id}
            fetch("../proc/proc_delete_usr.php",{ method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'datos=' + encodeURIComponent(JSON.stringify(usr))
            })
            .then(contenido => contenido.text())
            .then(confirmacion => {
                if (confirmacion == "OK") {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }else{
                    Swal.fire({
                        title: "Hubo un Error!",
                        text: confirmacion,
                        icon: "error"
                    });
                }
                crudUser()
            })
        }
    });

    // console.log("eliminar usuario con id = " + id)
}


function favlist() {
    fetch("../proc/proc_fav.php")
    .then(sapo => sapo.text())
    .then(peliculas =>{ 
        document.getElementById('home').innerHTML = peliculas
    })
}


function like_style() {
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
}

// PAGINACION DE LA PAGINA DE HOME
function Inicio(){
    // deleteGet()
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
        like_style()
        document.getElementById('like-btn').addEventListener("click",like_proc)
        document.getElementById("sapo").addEventListener("click", function() {
            window.location.href = "https://www.youtube.com"; // Aquí colocas la URL de YouTube
        });
    })
}


function like_proc() {
    var id = document.getElementById('like-btn').value;
        var datos = {
            id: id
        }
        fetch("../proc/proc_like_movie.php",{
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'movie=' + encodeURIComponent(JSON.stringify(datos))
        })
        .then(contenido =>contenido.text())
        .then(texto =>{
            document.getElementById('count').innerHTML = texto
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
        var title = "Bienvendio"
    }

    if(num == 9){
        var icon = "success"
        var title = "Se ha habilitado el acceso"
    }

    if(num == 10){
        var icon = "warning"
        var title = "Se ha denegado el acceso"
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
    var year = document.getElementById('year_peli');
    if (year.value < 1896) {
        year.classList.remove('is-valid');
        year.classList.add('is-invalid');
    } else {
        year.classList.remove('is-invalid');
        year.classList.add('is-valid');
    }
}

function FormSinopsis(){
    var nom = document.getElementById('sinopsis')
    if (nom.value === "") {
        nom.classList.remove('is-valid');
        nom.classList.add('is-invalid');
    } else {
        if (nom.value.length >= 250) {
            nom.classList.remove('is-invalid');
            nom.classList.add('is-valid');
        }else{
            nom.classList.remove('is-valid');
            nom.classList.add('is-invalid');
        }
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

// function validarForm(){
//     var nom = document.getElementById('nom_peli').value
//     var genero = document.getElementById('genero_peli'),value
//     var sinopsis = document.getElementById('sinopsis').value
// }





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
