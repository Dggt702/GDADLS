
<button type="button" id="capturarFoto" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tomar foto
    </button>

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">CAMARA:</h1>
            <button type="button" id="btnCerrar" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex justify-content-center">
            <video id="video" width="640" height="480" autoplay="true" class="rounded"></video>
            <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
        </div>
        <div class="modal-footer">
            <!-- input type="file" name="imageFile" id="imageFile" accept="image/*"--->
            <p id="mensaje"></p>
            <button id="captura" class="btn btn-warning" onclick="tomarFoto()" style="display:none;">Capturar Foto</button>
            <button id="gFoto" class="btn btn-success" onclick="guardarFoto()" style="display:none;">Guardar Foto</button>
            <button id="dFoto" class="btn btn-danger" onclick="descartarFoto()" style="display:none;">Descartar Foto</button>
        </div>
        </div>
    </div>
    </div>
    
    <script>
    
    const inputFoto = document.getElementById("archivoFoto");
    const mensaje = document.getElementById("mensaje");
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const context = canvas.getContext("2d");
    const btnCaptura = document.getElementById("captura");
    const btnGuardarFoto = document.getElementById("gFoto");
    const btnDescartarFoto = document.getElementById("dFoto");
    const btnTomarFoto = document.getElementById("capturarFoto");
    const btnCerrar = document.getElementById("btnCerrar");
    const marco =document.getElementById("marco");
    const modal =document.getElementById("exampleModal");

    const btnGrupo = [btnCaptura,btnGuardarFoto,btnDescartarFoto,btnTomarFoto,btnCerrar];

    var enProceso = false;

    btnGrupo.forEach(btn=>{
        btn.addEventListener("click",function(event){
            event.preventDefault();
        });
    })

    

    btnTomarFoto.addEventListener("click",activarCamara);
    btnCerrar.addEventListener("click",cerrarModal);

    imgFile.addEventListener("change",function(){
        let val = imgFile.value;
        console.log(val);
    })

    function activarCamara(){
        navigator.mediaDevices.getUserMedia({audio:false,video:true}).then((stream)=>{
        activarBotones();
        video.srcObject = stream;
        enProceso = true;
        }).catch((err)=>{
            console.log(err);
            mensaje.classList.add("text-danger");
            mensaje.innerHTML="No se ha encontrado una cámara";
            setTimeout(()=>{
                mensaje.classList.remove("text-danger");
                mensaje.innerHTML="";
            },6000);
        })
    }

    function activarBotones(){
        btnCaptura.style.display = "block";
    }

    function tomarFoto(){
        video.pause(); 
        btnCaptura.style.display = "none";
        btnGuardarFoto.style.display = "block";
        btnDescartarFoto.style.display = "block";  
    }

    function descartarFoto(){
        video.play();
        btnCaptura.style.display = "block";
        btnGuardarFoto.style.display = "none";
        btnDescartarFoto.style.display = "none";        
    }

    function guardarFoto(){
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        let urlDT = canvas.toDataURL('image/png');
        const imgFile = document.getElementById("imageFile");

        if(document.getElementById("imagen")){
            imagenCaja = document.getElementById("imagen");
            imagenCaja.style.backgroundImage = "url("+urlDT+")";
        }else if(document.getElementById("fotoCarnet")){
            foto = document.getElementById("fotoCarnet");
            foto.src = urlDT;
        }

        fetch(urlDT)
                .then(res => res.blob())
                .then(blob => {
                    const file = new File([blob], "foto.png", { type: 'image/png' });
                    dataArchivos = new DataTransfer();
                    dataArchivos.items.add(file);
                    imgFile.files=dataArchivos.files;
                });
                cerrarModal();
    }

    function cerrarModal(){
        if(enProceso){
            descartarFoto();
            video.pause(); 
            let tracks = video.srcObject.getTracks(); // Obtener todas las pistas del stream del video
            tracks.forEach(track => track.stop()); // Detener cada pista de manera individual
            video.srcObject = null; // Limpiar el stream del video
        }
        $('#exampleModal').modal('hide'); 
    }
</script>
