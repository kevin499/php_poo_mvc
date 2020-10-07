
const registrarDestinoForm = document.getElementById("registrarDestinoForm");
const registrarDestinoSubmit = registrarDestinoForm.querySelector('.submit');
const registrarDestinoModal = document.getElementById("registrarDestinoModal");

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
    registrarDestinoSubmit.innerHTML=loader;
    registrarDestinoSubmit.disabled=true;

    const data = new FormData(registrarDestinoForm);
    getAjaxResponse('http://localhost/proyectos/viajes_MVC/destino/registrarNuevoDestino',data).then((result=>{
        const respuesta = JSON.parse(result);
        if (respuesta["success"]){
            Swal.fire(
                'Buen trabajo!',
                'Se cargó correctamente el destino',
                'success'
            )
            var instance = M.Modal.getInstance(registrarDestinoModal);
            instance.close();
        }
        else{
            Swal.fire({
                icon: 'error',
                title: respuesta["error"],
            })
        }
        registrarDestinoSubmit.disabled=false;

    })).catch((err)=>{
        console.log(err)
        registrarDestinoSubmit.disabled=false;
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Algo salio mal',
        })
    }).finally(()=>{
        registrarDestinoSubmit.innerHTML="Registrar nuevo destino";
    });
})



document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, "opacity");
});

const getAjaxResponse = (url,data) =>{
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
        xmr.open("POST",url);
        xmr.send(data);


    })
}