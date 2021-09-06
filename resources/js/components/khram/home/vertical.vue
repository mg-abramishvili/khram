<template>
    <div style="width: 100%;">
        <div class="banner">
            <swiper ref="IndexBannerSwiper" :options="swiperIndexOptions" class="IndexBannerSwiper">
                <swiper-slide v-for="banner in banners" :key="'banner' + banner.id" class="index-banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.image + ')' }"></swiper-slide>
            </swiper>
        </div>

        <div class="headline">
            Свет Христов просвещает всех!
        </div>

        <div class="user-pages">
            <div class="row">
                <div v-if="settings.module_photoalbums == 'y'" class="col-6">
                    <a @click="GoToPhotoalbums()" class="index-button">
                        <div class="index-button_pic" style="background-image: url(/img/khram/7.jpg);"></div>
                        <div class="index-button_label">
                            Фотогалерея
                        </div>
                    </a>
                </div>

                <div v-if="settings.module_news == 'y'" class="col-6">
                    <a @click="GoToNews()" class="index-button">
                        <div class="index-button_pic" style="background-image: url(/img/khram/6.jpg);"></div>
                        <div class="index-button_label">
                            Новости
                        </div>
                    </a>
                </div>

                <div v-for="page in pages" :key="page.id" class="col-6">
                    <a @click="GoToPage(page.id, page.types)" class="index-button">
                        <template v-if="page.image_as_icon === '1'">
                            <div class="index-button_pic" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
                            <div class="index-button_minipic" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
                        </template>
                        
                        <template v-else>
                            <div class="index-button_pic"></div>
                        </template>
                        
                        <div class="index-button_label">
                            {{ page.title }}
                        </div>
                        
                    </a>
                </div>

                <div v-if="settings.module_routes == 'y'" class="col-6">
                    <a @click="GoToRoutes()" class="index-button">
                        <div class="index-button_pic" style="background-image: url(/img/khram/2.jpg);"></div>
                        <div class="index-button_label">
                            План здания
                        </div>
                    </a>
                </div>

                <div v-if="settings.module_reviews == 'y'" class="col-6">
                    <a @click="GoToReviews()" class="index-button">
                        <div class="index-button_pic" style="background-image: url(/img/khram/3.jpg);"></div>
                        <div class="index-button_label">
                            Отзывы
                        </div>
                    </a>
                </div>
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
                settings: {},
                pages: [],
                news: [],
                schemes: [],
                banners: [],
                photoalbum_last: {},
                swiperIndexOptions: {
                    slidesPerView: 1,
                    speed: 800,
                    loop: true,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false,
                        waitForTransition: false,
                    },
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
            fetch(`/api/front/pages/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json
                });
            fetch(`/api/front/news_three/`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                });
            fetch(`/api/front/schemes/`)
                .then(response => response.json())
                .then(json => {
                    this.schemes = json;
                });
            fetch(`/api/front/banners/`)
                .then(response => response.json())
                .then(json => {
                    this.banners = json
                });
            fetch(`/api/front/photoalbum-last/`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbum_last = json;
                    setTimeout(() => {
                        this.swiperArrows()
                    }, 2000);
                });
        },
        methods: {
            GoToPage(id, types) {
                var swprs_index = document.querySelectorAll('.IndexBannerSwiper');
                [].forEach.call(swprs_index, function(swpr_index) {
                    const swiper_index = document.querySelector('.IndexBannerSwiper').swiper;
                    swiper_index.slideTo(0, false)
                    swiper_index.autoplay.stop()
                    //console.log(swiper_index)
                });

                this.$router.push({name: 'khram_PageItem', params: {id: id}})
                //this.$refs.IndexBannerSwiper.$swiper.slideTo(0, false)

                if(types[0].id === 3) {
                    setTimeout(() => {
                        var swprs_p3 = document.querySelectorAll('.Page3Swiper');
                        [].forEach.call(swprs_p3, function(swpr_p3) {
                            const swiper_p3 = document.querySelector('.Page3Swiper').swiper;
                            swiper_p3.autoplay.run()
                            //console.log(swiper_p3)
                        });
                    }, 3000);
                }

                if(types[0].id === 5) {
                    this.$parent.reset_video = true
                }
            },
            GoToPhotoalbums() {
                this.$router.push({name: 'khram_Photoalbums'})
                //this.$refs.KhramIndexAllSwiper.$swiper.slideTo(0, false)
            },
            GoToVideoalbums() {
                this.$router.push({name: 'khram_Videoalbums'})
                //this.$refs.KhramIndexAllSwiper.$swiper.slideTo(0, false)
            },
            GoToReviews() {
                this.$router.push({name: 'khram_Reviews'})
                //this.$refs.KhramIndexAllSwiper.$swiper.slideTo(0, false)
            },
            GoToRoutes() {
                this.$router.push({name: 'khram_Routes'})
                //this.$refs.KhramIndexAllSwiper.$swiper.slideTo(0, false)
                this.$parent.reset_routes = true
            },
            GoToNews() {
                this.$router.push({name: 'khram_News'})
                //this.$refs.KhramIndexAllSwiper.$swiper.slideTo(0, false)
            },
            swiperArrows() {
                if(document.querySelectorAll('.swiper-slide').length > 60) {
                    this.slider_prev_next = true
                } else {
                    this.slider_prev_next = false
                }
            },
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>