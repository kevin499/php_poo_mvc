
const registrarDestinoForm = document.getElementById("registrarDestinoForm");
const registrarDestinoSubmit = registrarDestinoForm.querySelector('.submit');
const registrarDestinoModal = document.getElementById("registrarDestinoModal");

const modificarDestinoForm = document.getElementById("modificarDestinoForm");
const modificarDestinoModal = document.getElementById("modificarDestinoModal");
const modificarDestinoButtons = document.querySelectorAll(".modificarDestinoButton");


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
    registrarnuevoDestino(e);
})

modificarDestinoForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    alert("dfawdw")
})


document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, "opacity");
});

modificarDestinoButtons.forEach(btn => {btn.addEventListener('click', e=>{
    traerDestinoPorId(e.target.getAttribute('data-id'));
})
})




const traerDestinoPorId = (id) => {
    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/traerDestinoPorId?id='+id,"GET").then(result => {
        let response = JSON.parse(result);
        document.querySelector('#nombreModif').value = response['nombre'];
        document.querySelector('#descripcionModif').value = response['descripcion'];
        document.querySelector('#imagenModif').value = response['imagen'];
        document.querySelectorAll('label').forEach(label=>{label.classList='active'})
        var instance = M.Modal.getInstance(modificarDestinoModal);
        instance.open();
    })
}

const registrarnuevoDestino = (e)=>{
    e.preventDefault();
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
            console.log(registrarDestinoForm.querySelectorAll('input, textarea').forEach(item=>{item.value=""}))
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