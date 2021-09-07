<template>
    <div>
        <div class="container" style="position: relative; height: 100vh; background: transparent;">
            
            <div class="subheader">
                <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">Видеогалерея</h1>
            </div>

            <div v-if="videoalbums.length" class="gallery">
                <div class="gallery-list">
                    <hooper :settings="videoalbumsHooper">
                        <slide v-for="videoalbum in videoalbums" :key="videoalbum.id" class="gallery-list-item">
                            <a @click="GoToVideoalbum(videoalbum.id)">
                                <div v-if="videoalbum.cover" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + videoalbum.cover + ')' }"></div>
                                <div v-else class="gallery-list-item-pic" style="background-image: url(/img/Video-Placeholder.jpg)"></div>
                                <h2>{{ videoalbum.title }}</h2>
                            </a>
                        </slide>
                    </hooper>
                </div>
            </div>
            <div v-else>
                Видеогалерея пуста
            </div>
        </div>

        <div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
        </div>

    </div>
</template>

<script>
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        data() {
            return {
                videoalbums: [],
                videoalbumsHooper: {
                    itemsToShow: 1,
                    centerMode: true,
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/videoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbums = json;
                    if (json.length > 6) {
                        this.slider_prev_next = true
                    } else {
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToVideoalbum(id) {
                this.$router.push({name: 'khram_VideoalbumItem', params: {id: id}})
            },
        },
        components: {
            Hooper,
            Slide
        },
    }
</script>