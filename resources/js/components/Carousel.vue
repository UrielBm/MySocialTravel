<template>
    <!-- Make a div wrapped slider,set height and width -->
    <div style="width: 100%; margin: 20px auto; height: 400px">
        <!-- Using the slider component -->
        <slider ref="slider" :options="options">
            <!-- slideritem wrapped package with the components you need -->
            <slideritem
                v-for="(item, index) in datalist"
                :key="index"
                class="card-carousel"
            >
                <div style="width: 100%; height: 100%">
                    <div class="wrapperimg">
                        <img
                            class="img"
                            :src="item.data.img"
                            alt="picture del viaje"
                        />
                    </div>
                    <div class="wrapperinfo">
                        <h5 class="titulo">{{ item.data.titulo }}</h5>
                        <p style="white-space:initial" class="description">
                            {{ item.data.description }}
                        </p>
                        <a
                            class="btn btn-primary d-block text-uppercase"
                            :href="item.data.link"
                            >Ver Viaje</a
                        >
                    </div>
                </div>
            </slideritem>
            <!-- Customizable loading -->
            <div slot="loading">Aun no hay viajes publicados...</div>
        </slider>
    </div>
</template>
<script>
// import slider components
import { slider, slideritem } from "vue-concise-slider";
export default {
    props: ["items"],
    data() {
        return {
            //data list [array]
            datalist: this.items.map((item) => {
                return {
                    data: {
                        img: item.img,
                        titulo: item.titulo,
                        description: item.description,
                        link: item.link,
                    },
                };
            }),
            //Slider configuration [obj]
            options: {
                currentPage: 0,
                loop: true,
                autoplay: 8000,
            },
        };
    },
    components: {
        slider,
        slideritem,
    },
};
</script>
