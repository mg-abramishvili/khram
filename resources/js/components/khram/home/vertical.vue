<template>
    <div style="width: 100%;">
        <div class="banner">
            <template v-for="banner in banners">
                <div class="index-banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.image + ')' }"></div>
            </template>
        </div>
        <div class="user-pages">
            <div class="row">
                <div v-if="settings.module_photoalbums == 'y'" class="col-6">
                    <a @click="GoToPhotoalbums()">
                        <div class="user-pages-item-item_bg" style="background-image: url(/img/khram/7.jpg);"></div>
                        <div class="user-pages-item-item_label">
                            Фотогалерея
                        </div>
                    </a>
                </div>

                <div v-if="settings.module_news == 'y'" class="col-6">
                    <a @click="GoToNews()">
                        <div class="user-pages-item-item_bg" style="background-image: url(/img/khram/6.jpg);"></div>
                        <div class="user-pages-item-item_label">
                            Новости
                        </div>
                    </a>
                </div>

                <div v-for="page in pages" :key="page.id" class="col-6">
                    <a @click="GoToPage(page.id, page.types)">
                        <template v-if="page.image_as_icon === '1'">
                            <div class="user-pages-item-item_bg" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
                        </template>
                        
                        <template v-else>
                            <div class="user-pages-item-item_bg"></div>
                        </template>
                        
                        <div class="user-pages-item-item_label">
                            {{ page.title }}
                        </div>
                        
                    </a>
                </div>

                <div v-if="settings.module_routes == 'y'" class="col-6">
                    <a @click="GoToRoutes()">
                        <div class="user-pages-item-item_bg" style="background-image: url(/img/khram/2.jpg);"></div>
                        <div class="user-pages-item-item_label">
                            План здания
                        </div>
                    </a>
                </div>

                <div v-if="settings.module_reviews == 'y'" class="col-6">
                    <a @click="GoToReviews()">
                        <div class="user-pages-item-item_bg" style="background-image: url(/img/khram/3.jpg);"></div>
                        <div class="user-pages-item-item_label">
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
                swiperOptions: {
                    slidesPerView: 2,
                    slidesPerColumn: 3,
                    slidesPerColumnFill: 'column',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                },
                slider_prev_next: true,
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
                this.$router.push({name: 'khram_PageItem', params: {id: id}})
                //this.$refs.KhramIndexAllSwiper.$swiper.slideTo(0, false)

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
                if(document.querySelectorAll('.swiper-slide').length > 6) {
                    this.slider_prev_next = true
                } else {
                    this.slider_prev_next = false
                }
            },
        },
        computed: {
            swiper() {
                return this.$refs.KhramIndexAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>