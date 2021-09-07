<template>
    <div class="type-6 container-index">

        <div v-if="page.children">

        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <hooper :settings="type6Hooper">
            <slide v-for="child in page.children" :key="child.id" class="t6-button">
                <div @click="GoToPage(child.id, child.types)" class="t6-button_inner" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }">
                    <div v-if="child.image_as_icon === '1'" class="t6-button_image" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }"></div>
                    <span><i>{{ child.title }}</i></span>
                </div>
            </slide>
        </hooper>

        <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: -4vw"></div>
        <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: -4vw"></div>
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
        },
        components: {
            Hooper,
            Slide
        },
    }
</script>