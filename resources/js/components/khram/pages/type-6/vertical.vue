<template>
    <div class="type-6 container-index">

        <div v-if="page.children">

        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <swiper ref="Page6Swiper" :options="swiperPage6Options" class="Page6Swiper">
            <swiper-slide v-for="child in page.children" :key="child.id" class="t6-button">
                <div @click="GoToPage(child.id, child.types)" class="t6-button_inner" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }">
                    <div v-if="child.image_as_icon === '1'" class="t6-button_image" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }"></div>
                    <span><i>{{ child.title }}</i></span>
                </div>
            </swiper-slide>
        </swiper>

        <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: -4vw"></div>
        <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: -4vw"></div>
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
                swiperPage6Options: {
                    slidesPerView: 3,
                    slidesPerColumn: 3,
                    slidesPerGroup: 3,
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
                    if (json.children.length > 9) {
                        this.swiperPage6Options.centerInsufficientSlides = false,
                        this.swiperPage6Options.allowTouchMove = true,
                        this.slider_prev_next = true
                    } else {
                        this.swiperPage6Options.centerInsufficientSlides = true,
                        this.swiperPage6Options.allowTouchMove = false,
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToPage(id, types) {
                this.$router.push({name: 'khram_PageItem', params: {id: id}})
                this.$refs.Page6Swiper.$swiper.slideTo(0, false)

                if(types[0].id === 3) {
                    setTimeout(() => {
                        var swprs_p3 = document.querySelectorAll('.Page3Swiper');
                        [].forEach.call(swprs_p3, function(swpr_p3) {
                            const swiper_p3 = document.querySelector('.Page3Swiper').swiper;
                            swiper_p3.autoplay.start()
                            swiper_p3.slideNext(500, true)
                            //console.log(swiper_p3)
                        });
                    }, 3000);
                }

                if(types[0].id === 5) {
                    this.$parent.$parent.reset_video = true
                }
            },
        },
        components: {
            Swiper,
            SwiperSlide
        },
    }
</script>