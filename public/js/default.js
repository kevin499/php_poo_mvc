
const tablaDestino = document.getElementById('tablaDestino');

const registrarDestinoForm = document.getElementById("registrarDestinoForm");
const registrarDestinoSubmit = registrarDestinoForm.querySelector('.submit');
const registrarDestinoModal = document.getElementById("registrarDestinoModal");

const modificarDestinoForm = document.getElementById("modificarDestinoForm");
const modificarDestinoModal = document.getElementById("modificarDestinoModal");
const modificarDestinoButtons = document.querySelectorAll(".modificarDestinoButton");
const modificarDestinoSubmit = modificarDestinoForm.querySelector('.submit');

const eliminarDestinoButtons = document.querySelectorAll(".eliminarDestinoButton");


const loader = "  <div class=\"preloader-wrapper small active\">\n" +
    "    <div class=\"spinner-layer spinner-blue-only\">\n" +
    "      <div class=\"circle-clipper left\">\n" +
    "        <div class=\"circle\"></div>\n" +
    "      </div><div class=\"gap-patch\">\n" +
    "        <div class=\"circle\"></div>\n" +
    "      </div><div class=\"circle-clipper right\">\n" +
    "        <div class=\"circle\"></div>\n" +
    "      </div>\n" +
    "    </div>\n" +
    "  </div>"

registrarDestinoForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    registrarNuevoDestino(e);
})

modificarDestinoForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    modificarDestino(e.target.getAttribute('data-id'));
})

tablaDestino.addEventListener('click', (e)=>{
    if (e.target.classList.contains('eliminarDestinoButton')){
        eliminarDestino(e.target.getAttribute('data-id'));
    }
    else if (e.target.classList.contains('modificarDestinoButton')){
        traerDestinoPorId(e.target.getAttribute('data-id'));
    }
})

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, "opacity");
    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/listar',"GET").then(result => tablaDestino.innerHTML = result)
});



const traerDestinoPorId = (id) => {
    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/traerDestinoPorId/'+id,"GET").then(result => {
        let response = JSON.parse(result);
        document.querySelector('#nombreModif').value = response['nombre'];
        document.querySelector('#descripcionModif').value = response['descripcion'];
        document.querySelector('#imagenModif').value = response['imagen'];
        document.querySelectorAll('label').forEach(label=>{label.classList='active'})
        var instance = M.Modal.getInstance(modificarDestinoModal);
        instance.open();
        modificarDestinoForm.querySelector('input[name="id_modificar"]').value= id;
    })
}


const registrarNuevoDestino = ()=>{
    registrarDestinoSubmit.innerHTML=loader;
    registrarDestinoSubmit.disabled=true;

    const data = new FormData(registrarDestinoForm);
    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/registrarNuevoDestino',"POST",data).then((result=>{
        const respuesta = JSON.parse(result);
        if (respuesta["success"]){
            Swal.fire(
                'Buen trabajo!',
                'Se cargó correctamente el destino',
                'success'
            )
            var instance = M.Modal.getInstance(registrarDestinoModal);
            instance.close();
            registrarDestinoForm.querySelectorAll('input, textarea').forEach(item=>{item.value=""})
            getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/listar',"GET").then(result => tablaDestino.innerHTML = result)

        }
        else{
            Swal.fire({
                icon: 'error',
                title: respuesta["error"],
            })
        }
        registrarDestinoSubmit.disabled=false;
    })).catch((err)=>{
        registrarDestinoSubmit.disabled=false;
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Algo salio mal',
        })
    }).finally(()=>{
        registrarDestinoSubmit.innerHTML="Registrar nuevo destino";
    });
}

const modificarDestino = ()=>{
    modificarDestinoSubmit.innerHTML=loader;
    modificarDestinoSubmit.disabled=true;

    const data = new FormData(modificarDestinoForm);
    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/modificarDestino',"POST",data).then((result=>{
        const respuesta = JSON.parse(result);
        if (respuesta["success"]){
            Swal.fire(
                'Buen trabajo!',
                'Se cargó correctamente el destino',
                'success'
            )
            var instance = M.Modal.getInstance(modificarDestinoModal);
            instance.close();
            modificarDestinoForm.querySelectorAll('input, textarea').forEach(item=>{item.value=""})
            getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/listar',"GET").then(result => tablaDestino.innerHTML = result)

        }
        else{
            Swal.fire({
                icon: 'error',
                title: respuesta["error"],
            })
        }
        modificarDestinoSubmit.disabled=false;
    })).catch((err)=>{
        modificarDestinoSubmit.disabled=false;
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Algo salio mal',
        })
    }).finally(()=>{
        modificarDestinoSubmit.innerHTML="Registrar nuevo destino";
    });
}

const eliminarDestino = (id) => {
    Swal.fire({
        title: '¿Estás seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/eliminarDestino/'+id,"POST").then(result=>{
                if (result) {
                    Swal.fire(
                        'Eliminado!',
                        'El destino fue eliminado',
                        'success'
                    )
                    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/listar',"GET").then(result => tablaDestino.innerHTML = result)
                }
            }).catch(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salio mal',
                })
            })
        }
    })
}

const getAjaxResponse = (url,method,data=null) =>{
    return new Promise((resolve,reject)=>{
        const xmr = new XMLHttpRequest();
        xmr.addEventListener('load',(e)=>{
            console.log(e.target.status);
            if (e.target.status == 200 && e.target.readyState == 4){
                resolve(e.target.responseText);
            }
            else{
                reject("Error")
            }
        })
        xmr.open(method,url);
        xmr.send(data);


    })
}