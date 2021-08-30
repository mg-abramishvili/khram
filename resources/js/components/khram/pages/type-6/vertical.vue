<template>
    <div class="type-6 container-index">

        <div v-if="page.children">

        <div class="subheader">
            <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ page.title }}</h1>
        </div>

        <swiper ref="PagesSwiper" :options="swiperOptions" class="PagesSwiper">
            <swiper-slide v-for="child in page.children" :key="child.id" class="t6-button">
                <div @click="GoToPage(child.id)" class="t6-button_inner" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }">
                    <div v-if="child.image_as_icon === '1'" class="t6-button_image" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }"></div>
                    <span><i>{{ child.title }}</i></span>
                </div>
            </swiper-slide>
        </swiper>

        <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 1.3vw"></div>
        <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 1.3vw"></div>
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
                swiperOptions: {
                    slidesPerView: 3,
                    slidesPerColumn: 3,
                    slidesPerColumnFill: 'row',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.children.length > 3) {
                        this.swiperOptions.centerInsufficientSlides = false,
                        this.slider_prev_next = true
                    } else {
                        this.swiperOptions.centerInsufficientSlides = true,
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToPage(id) {
                this.$router.push({name: 'khram_PageItem', params: {id: id}})
                this.$refs.PagesSwiper.$swiper.slideTo(1, false)
            },
        },
        computed: {
            swiper() {
                return this.$refs.PagesSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        },
    }
</script>