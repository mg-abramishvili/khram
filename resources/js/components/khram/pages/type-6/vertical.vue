<template>
    <div class="type-6 container-index">

        <div v-if="page.children">

            <div class="subheader">
                <h1 class="h1-page">{{ page.title }}</h1>
            </div>

            <button @click.prevent="slidePrev">prev</button>
            <button @click.prevent="slideNext">next</button>

            <hooper ref="type6Hooper" :settings="type6Hooper">
                <slide v-for="i in Math.ceil(page.children.length / 9)" :key="'type6h' + i" class="t6-button">
                    <div class="row">
                        <div v-for="child in page.children.slice((i - 1) * 9, i * 9)" class="col-4">
                            <div @click="GoToPage(child.id, child.types)" class="t6-button_inner" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }">
                                <div v-if="child.image_as_icon === '1'" class="t6-button_image" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }"></div>
                                <span><i>{{ child.title }}</i></span>
                            </div>
                        </div>
                    </div>
                </slide>
            </hooper>

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
                type6Hooper: {
                    itemsToShow: 1,
                    centerMode: true,
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
                        this.slider_prev_next = true
                    } else {
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToPage(id, types) {
                this.$router.push({name: 'khram_PageItem', params: {id: id}})

                if(types[0].id === 5) {
                    this.$parent.$parent.reset_video = true
                }
            },
            slidePrev() {
                this.$refs.type6Hooper.slidePrev();
            },
            slideNext() {
                this.$refs.type6Hooper.slideNext();
            },
            slideToZero() {
                this.$refs.type6Hooper.slideTo(0);
            },
        },
        components: {
            Hooper,
            Slide
        },
    }
</script>