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
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(0,4)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 4" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(4,8)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(4 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 8" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(8,12)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(8 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 12" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(11,15)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(11 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 16" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(15,19)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(15 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 20" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(19,23)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(19 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 24" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(23,27)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(23 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 28" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(27,31)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(27 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
                        </div>
                    </div>
                </slide>
                <slide v-if="page.gallery && page.gallery.length > 32" class="gal-slide">
                    <div class="row">
                        <div v-for="(photoalbumPic, index) in page.gallery.slice(31,35)" :key="photoalbumPic" class="col-6">
                            <div @click="openModal(31 + index)" class="gal_image" v-bind:style="{ 'background-image': 'url(' + photoalbumPic + ')' }"></div>
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
                this.closeModal();
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