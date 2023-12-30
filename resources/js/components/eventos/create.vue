<template>
    <div class="rounded-lg overflow-hidden shadow-md bg-white my-4 mx-7 border-2 border-pink-400">
         
        <div class="p-4 flex justify-center md:justify-end border-b-2 border-secondary-100">
            <h4 class="text-pink-300 font-bold text-3xl uppercase font-custom2">crear un nuevo evento</h4>
        </div>  

        <div class="flex items-start justify-center">

            <div>
                <input
                    id="nombre"
                    name="nombre"
                    v-model="post.nombre"
                >
            </div>
            <div>
                <textarea 
                    id="ubicacion" 
                    name="ubicacion" 
                    v-model="post.ubicacion"
                    rows="3"
                >
                </textarea>
            </div>
            <div>
                <input 
                    id="mapa"
                    name="mapa"
                    v-model="post.mapa"
                >
            </div>            

            

        </div>

    </div>
</template>

<script>
export default{
    data(){
        return {
            post: {}
        }
    }
}
</script>