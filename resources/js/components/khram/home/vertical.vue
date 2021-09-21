<template>
    <div style="width: 100%;">
        <div class="banner">
            <hooper ref="indexHooper" :settings="indexHooper">
                <slide v-for="banner in banners" :key="'banner' + banner.id" class="index-banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.image + ')' }"></slide>
            </hooper>
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
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        data() {
            return {
                settings: {},
                pages: [],
                news: [],
                schemes: [],
                banners: [],
                photoalbum_last: {},
                indexHooper: {
                    itemsToShow: 1,
                    centerMode: true,
                    autoPlay: true,
                    playSpeed: 3000,
                    infiniteScroll: true,
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
                });
        },
        methods: {
            GoToPage(id, types) {
                this.$router.push({name: 'khram_PageItem', params: {id: id}})

                if(types[0].id === 5) {
                    this.$parent.reset_video = true
                }
                //this.$refs.indexHooper.update()
            },
            GoToPhotoalbums() {
                this.$router.push({name: 'khram_Photoalbums'})
            },
            GoToVideoalbums() {
                this.$router.push({name: 'khram_Videoalbums'})
            },
            GoToReviews() {
                this.$router.push({name: 'khram_Reviews'})
            },
            GoToRoutes() {
                this.$router.push({name: 'khram_Routes'})
                this.$parent.reset_routes = true
            },
            GoToNews() {
                this.$router.push({name: 'khram_News'})
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
            Hooper,
            Slide
        },
    }
</script>