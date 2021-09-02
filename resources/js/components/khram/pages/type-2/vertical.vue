<template>
    <div class="type-2">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <swiper ref="PageSwiper" :options="swiperOptions" class="PageSwiper">

            <swiper-slide v-if="page.text && page.text.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text2 && page.text2.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text2" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text3 && page.text3.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text3" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text4 && page.text4.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text4" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text5 && page.text5.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text5" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text6 && page.text6.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text6" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text7 && page.text7.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text7" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text8 && page.text8.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text8" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text9 && page.text9.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text9" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <swiper-slide v-if="page.text10 && page.text10.length > 0" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text10" class="type2slider-item-inner"></div>
                </div>
            </swiper-slide>

            <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
            <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
        </swiper>

    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                page: {},
                swiperOptions: {
                    slidesPerView: 1,
                    //simulateTouch: false,
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
                    if (json.gallery.length > 3) {
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.PageSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        }
    }
</script>