let cropper;
const imagenCaja = document.getElementById("fotoCarnet");
const btnRecortar = document.getElementById('openCropModal');


// Función para abrir el modal de confirmación
document.getElementById('openCropModal').addEventListener('click', function(event) {
  event.preventDefault();
  let srcDiferente ="https://acreditacionesparaeventos.com/imagenesPerfil/no-image-available.jpeg";
  if(imagenCaja.src!=srcDiferente){
    initCropper();
    ocultarOtrasOpciones();
    // Mostrar el modal de confirmación
    document.getElementById('confirmationModal').style.display = 'block';
  }
  });

  function comprobarRecortar(){
    let srcDiferente ="https://acreditacionesparaeventos.com/imagenesPerfil/no-image-available.jpeg";
    if(imagenCaja.src==srcDiferente){
      btnRecortar.classList.add("d-none");
    }
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    comprobarRecortar();
  });
  

  function ocultarOtrasOpciones(){
    let formImagen = document.getElementById("formImagen");
    formImagen.classList.remove("d-flex");
    formImagen.classList.add("d-none");
  }

  function mostrarOtrasOpciones(){
    let formImagen = document.getElementById("formImagen");
    formImagen.classList.remove("d-none");
    formImagen.classList.add("d-flex");
  }

  // Función para inicializar el cropper en la imagen visible
  function initCropper() {
    const originalImage = document.getElementById('fotoCarnet');
    cropper = new Cropper(originalImage, {
      aspectRatio: 1, // Proporción de recorte (puede ajustarse según necesites)
      viewMode: 1, // Modo de visualización: 0 (libre), 1 (restricción al contenedor)
      // Otros ajustes según la documentación de Cropper.js
    });
  }
  
  // Función para recortar la imagen
  function cropImage() {
    if (cropper) {
      const imgFile = document.getElementById("imageFile");
      const croppedCanvas = cropper.getCroppedCanvas();
      const croppedImage = croppedCanvas.toDataURL('image/jpeg');
  
      // Reemplazar la imagen original con la imagen recortada
      const originalImage = document.getElementById('fotoCarnet');
      originalImage.src = croppedImage;
      let formImage = document.getElementById('imageForm');
      formImage.src = croppedImage;

      fetch(croppedImage)
        .then(res => res.blob())
        .then(blob => {
            const file = new File([blob], "foto.jpeg", { type: 'image/jpeg' });
            dataArchivos = new DataTransfer();
            dataArchivos.items.add(file);
            imgFile.files=dataArchivos.files;
        });
              
      // Cerrar el modal y el cropper
      closeModal();
    }
  }
  
  // Función para cerrar el modal de confirmación y destruir el cropper
  function closeModal() {
    mostrarOtrasOpciones();
    document.getElementById('confirmationModal').style.display = 'none';
    cropper.destroy();
    cropper = null;
  }
  
  // Evento al confirmar el recorte
  document.getElementById('confirmCrop').addEventListener('click', cropImage);
  document.getElementById("confirmCrop").addEventListener("click",function(event){
    event.preventDefault();
  })
  
  // Evento al cancelar el recorte
  document.getElementById('cancelCrop').addEventListener('click', closeModal);
  document.getElementById("cancelCrop").addEventListener("click",function(event){
    event.preventDefault();
  })
  
















/*

function takePicture() {
    // Aquí deberías usar la API de la cámara, pero por simplicidad usaremos un ejemplo básico
    alert('Aquí puedes implementar la lógica para tomar una foto con la cámara.');
}

function uploadFile() {
    const uploadInput = document.getElementById('uploadInput');
    uploadInput.click(); // Mostrar el diálogo de selección de archivos al hacer clic en el botón

    uploadInput.onchange = function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('previewImage');
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    };
}

function openCropper() {
    const previewImage = document.getElementById('previewImage');

    // Inicializar el cropper en la imagen de previewImage
    cropper = new Cropper(previewImage, {
        aspectRatio: 1, // Proporción de recorte (puede ser ajustada según necesites)
        viewMode: 1, // Modo de visualización: 0 (libre), 1 (restricción al contenedor)
        // Otros ajustes según la documentación de Cropper.js
    });

    // Mostrar el cropper en algún contenedor
    document.getElementById('cropperContainer').style.display = 'block';

    // Ejemplo de uso: llamada a la función openCropper desde un evento, como el clic de un botón
    document.getElementById('openCropperButton').addEventListener('click', openCropper);

}

// Función para obtener la imagen recortada
function getCroppedImage() {
    if (cropper) {
        const croppedImage = croppedCanvas.toDataURL('image/jpeg'); // Obtener la imagen en formato JPEG
        cropper.replace(previewImage.src); // Reemplazar la imagen del cropper por la imagen de la etiqueta img

        // Crear un elemento <img> para mostrar la imagen recortada
        const croppedImageElement = document.createElement('img');
        croppedImageElement.src = croppedImage;
        croppedImageElement.className = "img-fluid"
        croppedImageElement.alt = 'Imagen Recortada';
        document.getElementById('marcoFoto').appendChild(croppedImageElement);

        // Mostrar la imagen recortada en algún elemento del DOM
        const resultContainer = document.getElementById('marcoFoto');
        resultContainer.innerHTML = ''; // Limpiar el contenedor antes de agregar la nueva imagen
        resultContainer.appendChild(croppedImageElement);

        // Cerrar el cropper después de obtener la imagen recortada
        cropper.destroy();
        cropper = null; // Establecer cropper como null para liberar la referencia

        // Ocultar las imagen Preview para que solo se muestre la recortada
        previewImage.style.display = 'none';
    } else {
        alert('Por favor, abre la herramienta de recorte primero.');
    }
}*/