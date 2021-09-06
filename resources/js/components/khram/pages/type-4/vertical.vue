<template>
    <div class="type-4">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <div class="gallery-detail" style="padding: 0;">
            <swiper ref="Page4Swiper" :options="swiperPage4Options" class="Page4Swiper">
                <swiper-slide v-for="photoalbumPic in page.gallery" :key="photoalbumPic" class="gallery-detail-item">
                    <img :src="photoalbumPic">
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
            </swiper>
        </div>

    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                page: {},
                swiperPage4Options: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        components: {
            Swiper,
            SwiperSlide
        }
    }
</script>