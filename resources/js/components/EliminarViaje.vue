<template>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" @click="handleDelete"><path style="fill: #bd1616" d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>   
</template>
<script>

export default {
    props: ['viajeId'],
    methods : {
        async handleResponse (){
             try {
                const params = { id: this.viajeId }
                await axios.delete(`/mis_viajes/${this.viajeId}`,{params, _method: 'delete'});
                //eliminando elemnto del DOM
                this.$el.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode);
                this.$swal({
                    title: "Viaje eliminado",
                    text: "Se elimino el viaje correctamente",
                    icon: 'success'
                });

             } catch (error) {
                 this.$swal({
                        title: "Error al eliminar",
                        text: `Intenta más tarde, ocurrio un prolema al eliminar el viaje.`,
                        icon: 'error'
                    })
             }
         },

         handleDelete(){
            this.$swal({
                title: 'Estás por eliminar este viaje',
                text: "Una vez eliminado no se podra revertir la acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#bd4b4b',
                cancelButtonColor: '#6e85b2',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: "No,Cancelar",
                }).then((result) => {
                if (result.isConfirmed) 
                {
                    this.handleResponse();
                }
                })
         }
    }
}
</script>