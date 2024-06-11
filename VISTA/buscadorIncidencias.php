<form action="" method="POST" id="formularioBusqueda">
    <div class="row">
        <div class="col-6">
            <?php
                echo FuncionesVista::imprimirSelectArbitros("filtradoArbitro","filtradoArbitro"); 
             ?>
        </div>
    </div>    
</form>


<div class="mt-3 row" id="content">

</div>

<script>
    
    document.getElementById("formularioBusqueda").addEventListener("submit", function(event) {
    event.preventDefault();  
    });

    getData();
    document.getElementById("filtradoArbitro").addEventListener("change",getData);

    function getData(){
        let inputDeporte = document.getElementById("filtradoArbitro").value;
        let content = document.getElementById("content");
        
        let url = "../CONTROLADOR/buscadorIncidencias.php";
        let formData = new FormData();
        
        formData.append('filtradoArbitro',inputDeporte);

        fetch(url,{
            method:"POST",
            body:formData
        }).then(response=>response.json())
        .then(data => {
            content.innerHTML = data
        }).catch(err=>console.log(err))
    }

    

</script>