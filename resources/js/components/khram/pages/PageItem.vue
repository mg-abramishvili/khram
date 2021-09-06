<template>
    <div v-if="settings.orientation === 'vertical'">
        
        <div v-for="type in page.types" :key="type.id" class="container" style="position: relative; background: transparent;">
            <div class="page-item">
                <KhramPageType1Vertical v-if="type.id == '1'" />
                <KhramPageType2Vertical v-if="type.id == '2'" />
                <KhramPageType3Vertical v-if="type.id == '3'" />
                <KhramPageType4Vertical v-if="type.id == '4'" />
                <KhramPageType5Vertical v-if="type.id == '5'" />
                <KhramPageType6Vertical v-if="type.id == '6'" />
                <KhramPageType7Vertical v-if="type.id == '7'" />
                <KhramPageType9Vertical v-if="type.id == '9'" />
                <KhramPageType10Vertical v-if="type.id == '10'" />
            </div>
        </div>

        <div class="footer">
            
            <template v-if="page.parent_id">
                <template v-for="parent_page in pages">
                    <template v-if="parent_page.id == page.parent_id">
                        <a @click="GoBack(parent_page.id)">
                            <i style="font-style: normal; color: #fff"><img src="/img/khram/back.svg"></i>
                        </a>
                    </template>
                </template>
            </template>

            <a @click="GoHome()">
                <img src="/img/khram/home.svg">
            </a>
        </div>
        

    </div>
</template>

<script>
    import KhramPageType1Vertical from '../pages/type-1/vertical'
    import KhramPageType2Vertical from '../pages/type-2/vertical'
    import KhramPageType3Vertical from '../pages/type-3/vertical'
    import KhramPageType4Vertical from '../pages/type-4/vertical'
    import KhramPageType5Vertical from '../pages/type-5/vertical'
    import KhramPageType6Vertical from '../pages/type-6/vertical'
    import KhramPageType7Vertical from '../pages/type-7/vertical'
    import KhramPageType9Vertical from '../pages/type-9/vertical'
    import KhramPageType10Vertical from '../pages/type-10/vertical'

    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                settings: {},
                page: {},
                pages: [],
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.parent_id !== null) {
                        fetch(`/api/front/page/${this.page.parent_id}`)
                            .then(response => response.json())
                            .then(json => {
                                this.parent_page = json.title;
                            });
                    }
                });
            fetch(`/api/front/pages_all/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json;
                    setTimeout(() => {
                    var swprs = document.querySelectorAll('.Page3Swiper');
                        [].forEach.call(swprs, function(swpr) {
                            const swiper = document.querySelector('.Page3Swiper').swiper;
                            swiper.autoplay.start();
                            //console.log(swiper)
                        });
                    }, 3000);
                });

            
        },
        methods: {
            GoBack(id) {
                // page 2 slider goto0
                var swprs_p2 = document.querySelectorAll('.Page2Swiper');
                [].forEach.call(swprs_p2, function(swpr_p2) {
                    const swiper_p2 = document.querySelector('.Page2Swiper').swiper;
                    swiper_p2.slideTo(0, false)
                });

                // page 3 slider sleep
                var swprs_p3 = document.querySelectorAll('.Page3Swiper');
                [].forEach.call(swprs_p3, function(swpr_p3) {
                    const swiper_p3 = document.querySelector('.Page3Swiper').swiper;
                    swiper_p3.slideTo(0, false)
                    swiper_p3.autoplay.stop()
                });

                // page 4 slider goto0
                var swprs_p4 = document.querySelectorAll('.Page4Swiper');
                [].forEach.call(swprs_p4, function(swpr_p4) {
                    const swiper_p4 = document.querySelector('.Page4Swiper').swiper;
                    swiper_p4.slideTo(0, false)
                });

                this.$router.push({name: 'khram_PageItem', params: {id: id}})
            },
            GoHome() {
                this.$router.push({name: 'khram_Home'})

                // page 2 slider goto0
                var swprs_p2 = document.querySelectorAll('.Page2Swiper');
                [].forEach.call(swprs_p2, function(swpr_p2) {
                    const swiper_p2 = document.querySelector('.Page2Swiper').swiper;
                    swiper_p2.slideTo(0, false)
                });

                // page 3 slider sleep
                var swprs_p3 = document.querySelectorAll('.Page3Swiper');
                [].forEach.call(swprs_p3, function(swpr_p3) {
                    const swiper_p3 = document.querySelector('.Page3Swiper').swiper;
                    swiper_p3.slideTo(0, false)
                    swiper_p3.autoplay.stop()
                });

                // page 4 slider goto0
                var swprs_p4 = document.querySelectorAll('.Page4Swiper');
                [].forEach.call(swprs_p4, function(swpr_p4) {
                    const swiper_p4 = document.querySelector('.Page4Swiper').swiper;
                    swiper_p4.slideTo(0, false)
                });

                // index slider awake
                setTimeout(() => {
                    var swprs_index = document.querySelectorAll('.IndexBannerSwiper');
                    [].forEach.call(swprs_index, function(swpr_index) {
                        const swiper_index = document.querySelector('.IndexBannerSwiper').swiper;
                        swiper_index.autoplay.run();
                        //console.log(swiper)
                    });
                }, 3000);
                
            },
        },
        components: {
            KhramPageType1Vertical,
            KhramPageType2Vertical,
            KhramPageType3Vertical,
            KhramPageType4Vertical,
            KhramPageType5Vertical,
            KhramPageType6Vertical,
            KhramPageType7Vertical,
            KhramPageType9Vertical,
            KhramPageType10Vertical
        }
    }
</script>