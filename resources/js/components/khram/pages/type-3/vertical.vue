<template>
    <div class="type-3">
        
        <div v-if="page.gallery">
            <div class="subheader">
                <h1 class="h1-page">{{ page.title }}</h1>
            </div>

            <swiper ref="Page3Swiper" :options="swiperPage3Options" class="Page3Swiper">
                <swiper-slide v-for="pic in page.gallery" :key="pic" class="type3slider">
                    <div class="type3slider-item" v-bind:style="{ 'background-image': 'url(' + pic + ')' }"></div>
                </swiper-slide>
                <!--<div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>-->
                
            </swiper>

            <div class="page-detail-text mb-0" style="height: 47vh; padding: 0; padding-right: 1vh;">
                <div v-html="page.text"></div>
            </div>

        </div>

    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                page: [],
                swiperPage3Options: {
                    slidesPerView: 1,
                    speed: 800,
                    loop: false,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                slider_prev_next: true,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.gallery.length > 1) {
                        this.swiperPage3Options.loop = true
                        this.swiperPage3Options.allowTouchMove = true
                        this.slider_prev_next = true
                    } else {
                        this.swiperPage3Options.loop = false
                        this.swiperPage3Options.allowTouchMove = false
                        this.slider_prev_next = false
                    }
                });
        },
        components: {
            Swiper,
            SwiperSlide
        }
    }
</script>