<template>
    <div>
        <div class="d-flex align-items-center justify-content-center">
            <span class="like-btn"  @click="likeViaje" v-bind:class="{'like-active': isActive}"></span>
        </div>
        <div class="d-flex align-items-center justify-content-center mb-3">
                <svg class="heart" viewBox="0 0 32 29.6">
                    <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                </svg>
                <span class="text"> {{countLikes}} me gusta recibidos.</span>
        </div>
    </div>
</template>
<script>
export default {
    props: ['viajeId','like','likes'],
    data: function (){
        return {
            isActive: this.like,
            totalLikes: this.likes,
        } 
    },
    methods: {
        async likeViaje(){
            try {
                const  {data} = await axios.put(`/viajes/${this.viajeId}`);
                this.isActive  = !this.isActive
                data.attached.length > 0 ? this.$data.totalLikes++ : this.$data.totalLikes--;
            } catch (error) {
                if(error.response.status === 401){
                    window.location = '/register'
                }
            }
        }
    },
    computed: {
        countLikes: function(){
            return this.totalLikes
        }  
    }
}
</script>
