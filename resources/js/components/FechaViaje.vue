<template>
    <span class="text Capital" v-text="formatDate"></span>
</template>
<script>
import { es } from 'date-fns/locale'
export default {
    props: ['fecha'],
    computed: {
        formatDate () {
            if(this.fecha){
                return `${dateFns.formatDistance(new Date(this.fecha), new Date(),{locale: es})} atras.`
            }else {
                return "Sin fecha de publicación."
            }
        }
    }
}
</script>