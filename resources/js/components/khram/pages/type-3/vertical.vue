<template>
    <div class="type-3">
        
        <div v-if="page.gallery">
            <div class="subheader">
                <h1 class="h1-page">{{ page.title }}</h1>
            </div>

            <div style="position: relative;">
                <button v-if="slider_prev_next" @click.prevent="slidePrev" class="hooper_nav_button hooper_nav_button_prev"></button>
                <button v-if="slider_prev_next" @click.prevent="slideNext" class="hooper_nav_button hooper_nav_button_next"></button>

                <hooper ref="type3Hooper" :settings="type3Hooper">
                    <slide v-for="pic in page.gallery" :key="pic" class="type3slider">
                        <div class="type3slider-item" v-bind:style="{ 'background-image': 'url(' + pic + ')' }"></div>
                    </slide>
                </hooper>
            </div>

            <div class="page-detail-text mb-0" style="height: 47vh; padding: 0; padding-right: 1vh;">
                <div v-html="page.text"></div>
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
                page: [],
                type3Hooper: {
                    itemsToShow: 1,
                    centerMode: true,
                    autoPlay: true,
                    playSpeed: 3000,
                    infiniteScroll: true,
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
                        this.slider_prev_next = true
                        this.type3Hooper.infiniteScroll = true
                    } else {
                        this.slider_prev_next = false
                        this.type3Hooper.infiniteScroll = false
                    }
                });
        },
        methods: {
            slidePrev() {
                this.$refs.type3Hooper.slidePrev();
            },
            slideNext() {
                this.$refs.type3Hooper.slideNext();
            },
        },
        components: {
            Hooper,
            Slide
        }
    }
</script>