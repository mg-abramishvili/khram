<template>
    <div>
        <div class="container" style="position: relative; height: 100vh; background: transparent;">
            
            <div class="subheader">
                <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">Видеогалерея</h1>
            </div>

            <div v-if="videoalbums.length" class="gallery">
                <div class="gallery-list">
                    <swiper ref="VideoalbumsAllSwiper" :options="swiperOptions">
                        <swiper-slide v-for="videoalbum in videoalbums" :key="videoalbum.id" class="gallery-list-item">
                            <a @click="GoToVideoalbum(videoalbum.id)">
                                <div v-if="videoalbum.cover" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + videoalbum.cover + ')' }"></div>
                                <div v-else class="gallery-list-item-pic" style="background-image: url(/img/Video-Placeholder.jpg)"></div>
                                <h2>{{ videoalbum.title }}</h2>
                            </a>
                        </swiper-slide>
                    </swiper>

                    <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 1vw"></div>
                    <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 1vw"></div>
                </div>
            </div>
            <div v-else>
                Видеогалерея пуста
            </div>
        </div>

        <div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
        </div>

    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                videoalbums: [],
                swiperOptions: {
                    slidesPerView: 3,
                    slidesPerColumn: 2,
                    slidesPerGroup: 2,
                    slidesPerColumnFill: 'row',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/videoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbums = json;
                    if (json.length > 6) {
                        this.slider_prev_next = true
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        methods: {
            GoToVideoalbum(id) {
                this.$router.push({name: 'khram_VideoalbumItem', params: {id: id}})
                this.$refs.VideoalbumsAllSwiper.$swiper.slideTo(1, false)
            },
        },
        computed: {
            swiper() {
                return this.$refs.VideoalbumsAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>