<template>
    <div class="type-4">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <div style="padding: 0;">
            <button @click.prevent="slidePrev" class="hooper_nav_button hooper_nav_button_prev"></button>
            <button @click.prevent="slideNext" class="hooper_nav_button hooper_nav_button_next"></button>
            
            <hooper ref="type4Hooper" :settings="type4Hooper">
                <slide v-if="page.gallery && page.gallery.length" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(0,9)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 9" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(9,18)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(9 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 18" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(18,27)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(18 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 27" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(27,36)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(27 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
            </hooper>
        
            <div id="t4modal" class="t4modal modal_hidden">
                <button @click.prevent="slideDPrev" class="hooper_nav_button hooper_nav_button_prev" style="margin-left:0;"></button>
                <button @click.prevent="slideDNext" class="hooper_nav_button hooper_nav_button_next" style="margin-right:0;"></button>

                <hooper ref="type4DHooper" :settings="type4DHooper">
                    <slide v-for="photoalbumPic in page.gallery" :key="photoalbumPic">
                        <img :src="photoalbumPic">
                    </slide>
                </hooper>
                <div @click="closeModal()" class="t4modal_close">&times;</div>
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
                page: {},
                type4Hooper: {
                    itemsToShow: 1,
                },
                type4DHooper: {
                    itemsToShow: 1,
                    transition: 1,
                },
                slider_prev_next: false,
                modal: false,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.gallery.length > 9) {
                        this.slider_prev_next = true
                    } else {
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            slidePrev() {
                this.$refs.type4Hooper.slidePrev();
            },
            slideNext() {
                this.$refs.type4Hooper.slideNext();
            },
            slideDPrev() {
                this.$refs.type4DHooper.slidePrev();
            },
            slideDNext() {
                this.$refs.type4DHooper.slideNext();
            },
            slideToZero() {
                this.$refs.type4Hooper.slideTo(0);
                this.$refs.type4DHooper.slideTo(0);
            },
            openModal(index) {
                this.$refs.type4DHooper.slideTo(index);
                document.getElementById('t4modal').classList.remove('modal_hidden')
                document.getElementById('t4modal').classList.add('modal_visible')
            },
            closeModal() {
                document.getElementById('t4modal').classList.remove('modal_visible')
                document.getElementById('t4modal').classList.add('modal_hidden')
            },
        },
        components: {
            Hooper,
            Slide
        }
    }
</script>