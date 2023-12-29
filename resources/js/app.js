import Dropzone from "dropzone";
 
Dropzone.autoDiscover = false;

if(document.getElementById("dropzone")) {
    
    const dropzone = new Dropzone(".dropzone", {
        dictDefaultMessage: "Arrastra aqui tus imagenes",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar imagen",
        dictCancelUpload: "Cancelar",
        dictMaxFilesExceeded: "No se pueden subir más archivos",
        maxFiles: 5,
        uploadMultiple: false,
        init: function() {
            if(document.querySelector('[name="imagen"]').value.trim()){
                const imagenPublicada = {}
                imagenPublicada.size = 1234;
                imagenPublicada.name = document.querySelector('[name="imagen"]').value;
    
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, '/uploads/${imagenPublicada.name}');
    
                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        },
    });

    let imagenes = [];

    dropzone.on("success", function (file, response){
        imagenes.push(response.imagen);
        document.querySelector('[name="imagen"]').value = JSON.stringify(imagenes);
    });

    dropzone.on('removedfile', function() {
        document.querySelector('[name="imagen"]').value = '';
    });

}

import './jon';
