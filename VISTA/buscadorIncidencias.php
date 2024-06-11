<form action="" method="POST" id="formularioBusqueda">
    <div class="row">
        <div class="col-6">
            <input class="form-control" type="text" name="busquedaClub" id="busquedaClub" placeholder="Buscar">       
        </div>
        <div class="col-6">
            <?php
                echo FuncionesVista::imprimirSelectDeportes("filtradoDeporte","filtradoDeporte"); 
             ?>
        </div>
    </div>    
</form>


<div class="mt-3" id="content">
</div>

<script>
    
    document.getElementById("formularioBusqueda").addEventListener("submit", function(event) {
    event.preventDefault();  
    });

    getData();
    document.getElementById("busquedaClub").addEventListener("keyup",getData);
    document.getElementById("filtradoDeporte").addEventListener("change",getData);

    function getData(){
        let input = document.getElementById("busquedaClub").value;
        let inputDeporte = document.getElementById("filtradoDeporte").value;

        let content = document.getElementById("content");
        let url = "../CONTROLADOR/buscadorClub.php";
        let formData = new FormData();
        
        formData.append('busquedaClub',input);
        formData.append('filtradoDeporte',inputDeporte);

        fetch(url,{
            method:"POST",
            body:formData
        }).then(response=>response.json())
        .then(data => {
            content.innerHTML = data
        }).catch(err=>console.log(err))
    }

    

</script>