<form action="" method="POST" id="formularioBusqueda">
    <div class="row">
        <div class="col-6">
            <input class="form-control" type="text" name="busquedaArbitro" id="busquedaArbitro" placeholder="Buscar">
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
    document.getElementById("busquedaArbitro").addEventListener("keyup",getData);

    function getData(){
        let input = document.getElementById("busquedaArbitro").value;

        let content = document.getElementById("content");
        let url = "../CONTROLADOR/buscadorArbitro.php";
        let formData = new FormData();
        
        content.innerHTML='<div class="d-flex justify-content-center"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        formData.append('busquedaArbitro',input);

        fetch(url,{
            method:"POST",
            body:formData
        }).then(response=>response.json())
        .then(data => {
            content.innerHTML = data
            console.log(data);
        }).catch(err=>console.log(err))
    }

    

</script>