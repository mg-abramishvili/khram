<template>
    <div class="type-2">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <button @click.prevent="slidePrev" class="hooper_nav_button hooper_nav_button_prev"></button>
        <button @click.prevent="slideNext" class="hooper_nav_button hooper_nav_button_next"></button>

        <hooper ref="type2Hooper" :settings="type2Hooper">

            <slide v-if="page.text && page.text.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text2 && page.text2.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text2" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text3 && page.text3.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text3" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text4 && page.text4.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text4" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text5 && page.text5.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text5" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text6 && page.text6.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text6" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text7 && page.text7.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text7" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text8 && page.text8.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text8" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text9 && page.text9.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text9" class="type2slider-item-inner"></div>
                </div>
            </slide>

            <slide v-if="page.text10 && page.text10.length > 20" class="type2slider-slide">
                <div class="type2slider-item">
                    <div v-html="page.text10" class="type2slider-item-inner"></div>
                </div>
            </slide>

        </hooper>

    </div>
</template>

<script>
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        data() {
            return {
                page: {},
                type2Hooper: {
                    itemsToShow: 1,
                    centerMode: true,
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
                        //this.swiperPage2Options.centerInsufficientSlides = false
                    } else {
                        //this.swiperPage2Options.centerInsufficientSlides = true
                    }
                });
        },
        methods: {
            slidePrev() {
                this.$refs.type2Hooper.slidePrev();
            },
            slideNext() {
                this.$refs.type2Hooper.slideNext();
            },
            slideToZero() {
                this.$refs.type2Hooper.slideTo(0);
            },
        },
        components: {
            Hooper,
            Slide
        }
    }
</script>