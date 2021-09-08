<template>
    <div class="type-4">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <div style="padding: 0;">
            <button @click.prevent="slidePrev" class="hooper_nav_button hooper_nav_button_prev"></button>
            <button @click.prevent="slideNext" class="hooper_nav_button hooper_nav_button_next"></button>
            
            <hooper :settings="type4Hooper">
                <slide v-if="page.gallery && page.gallery.length" class="gal-slide">
                    <div class="row">
                        <div v-for="photoalbumPic in page.gallery.slice(0,9)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(photoalbumPic)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 9" class="gal-slide">
                    <div class="row">
                        <div v-for="photoalbumPic in page.gallery.slice(9,18)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(photoalbumPic)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 18" class="gal-slide">
                    <div class="row">
                        <div v-for="photoalbumPic in page.gallery.slice(18,27)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(photoalbumPic)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 27" class="gal-slide">
                    <div class="row">
                        <div v-for="photoalbumPic in page.gallery.slice(27,36)" :key="photoalbumPic" class="col-4">
                            <div @click="openModal(photoalbumPic)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
            </hooper>
        
            <div v-if="modal" class="t4modal">
                <hooper :settings="type4DHooper">
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
                    centerMode: true,
                },
                type4DHooper: {
                    itemsToShow: 1,
                    centerMode: true,
                },
                slider_prev_next: false,
                modal: false,
                modal_image: '',
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
            openModal(img) {
                this.modal_image = img
                this.modal = true
            },
            closeModal() {
                this.modal = false
            },
        },
        components: {
            Hooper,
            Slide
        }
    }
</script>